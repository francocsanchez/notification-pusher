<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageSent;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show(Message $message)
    {
        return view('message.show', compact('message'));
    }

    public function store(MessageRequest $request)
    {
        $message = Message::create([
            'subject' => $request->subject,
            'body'  =>  $request->body,
            'from_user_id'  =>  auth()->id(),
            'to_user_id'    =>  $request->to_user_id
        ]);

        $user = User::find($request->to_user_id);
        $user->notify(new MessageSent($message));

        $request->session()->flash('flash.banner', 'Tu mensaje fue enviado correctamente');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }
}

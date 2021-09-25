<?php

namespace App\Http\Controllers;

use App\Models\Message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show(Message $message)
    {
        return view('message.show', compact('message'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject'    =>  'required|min:3',
            'body'      =>  'required|min:10',
            'to_user_id'    =>  'required|exists:users,id',
        ]);

        Message::create([
            'subject' => $request->subject,
            'body'  =>  $request->body,
            'from_user_id'  =>  auth()->id(),
            'to_user_id'    =>  $request->to_user_id
        ]);

        $request->session()->flash('flash.banner', 'Tu mensaje fue enviado correctamente');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }
}

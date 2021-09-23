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
            'subjet'    =>  'required|min:3',
            'body'      =>  'required|min:10',
            'to_user_id'    =>  'required|exists:users,id',
        ]);
    }
}

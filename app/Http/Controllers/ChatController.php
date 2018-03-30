<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Message;
use Auth;

class ChatController extends Controller
{
    public function __call($method, $parameters)
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chat.index');
    }

    public function fetch()
    {
        return Message::with('user')->get();
    }

    /**
     * Create a new message instance.
     */
    public function sendMessage()
    {
        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => request()->message
        ]);

        broadcast(new MessageSentEvent($message, $user))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}

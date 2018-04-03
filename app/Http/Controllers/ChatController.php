<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Message;
use Auth;
use JavaScript;

class ChatController extends Controller
{
    public function __call($method, $parameters)
    {
        $this->middleware('auth');
    }

    public function index()
    {
        JavaScript::put([
            'user' => json_decode(Auth::user())
        ]);

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

        broadcast(new MessageSentEvent($message, $user));

        return ['status' => 'Message Sent!'];
    }
}

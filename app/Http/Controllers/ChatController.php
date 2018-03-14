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
//        $data = [
//            'title' => 'Hi ' . Auth::user()->name,
//            'messages' => Message::latest()->paginate(5),
//            'messagesCount' => Message::count(),
//        ];
//
//        return view('chat.index', $data);
    }

    /**
     * Create a new message instance.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMessage()
    {
        // Validate the request...

        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => request()->message
        ]);

        broadcast(new MessageSentEvent($user, $message));

//        $message = new Message();
//
//        $message->message = $request->input('message');
//
//        $message->user_id = Auth::user()->id;
//
//        $message->save();
//
//        return redirect()->action('ChatController@index');
    }
}

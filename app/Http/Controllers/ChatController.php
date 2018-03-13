<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Auth;

class ChatController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Hi ' . Auth::user()->name,
            'messages' => Message::latest()->paginate(5),
            'messagesCount' => Message::count(),
        ];

        return view('chat.index', $data);
    }

    /**
     * Create a new message instance.
     *
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request...

        $message = new Message();

        $message->message = $request->input('message');

        $message->user_id = Auth::user()->id;

        $message->save();

        return redirect()->action('ChatController@index');
    }
}

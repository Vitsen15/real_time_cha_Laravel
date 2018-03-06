<?php

namespace App\Http\Controllers;

class ChatController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Guest Book On Laravel'
        ];

        return view('chat.index', $data);
    }
}

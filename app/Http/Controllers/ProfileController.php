<?php

namespace App\Http\Controllers;

use Auth;
use JavaScript;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avatarUrl = 'storage/' . Auth::user()->img_url;

        JavaScript::put([
            'avatarUrl' => $avatarUrl,
            'name' => Auth::user()->name
        ]);

        return view('user.profile');
    }
}

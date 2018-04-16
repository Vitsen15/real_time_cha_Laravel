<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Illuminate\Http\Request;
use JavaScript;
use Storage;
use Validator;

//use Request;

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

    /**
     * @param Request $request
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function changeAvatar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'avatar' => 'image|max:10240|dimensions:max_height=500,max_width=1500|mimes:jpeg, png, gif'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $user = Auth::user();

        if (!empty($user->img_url)) {
            $oldAvatarPath = 'public/' . $user->img_url;

            Storage::disk('local')->delete($oldAvatarPath);
        }

        $newAvatar = $request->file('avatar');

        $newAvatarName = $user->name . '-' . $user->id . '.' . $newAvatar->extension();

        if ($newAvatar) {
            Storage::disk('local')->put('public/avatars/' . $newAvatarName, File::get($newAvatar));
            $user->img_url = 'avatars/' . $newAvatarName;
            $user->save();
        }
    }
}

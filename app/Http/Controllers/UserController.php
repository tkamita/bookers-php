<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
        $users = User::paginate(8);
        $params = [
            'user' => $user,
            'users' => $users,
        ];
        return view('user.index', $params);
    }
    
    public function show($id) {
        $user = User::find($id);
        $user->books = $user->books()->paginate(8);
        return view('user.show', ['user' => $user]);
    }
    
    public function edit($id) {
        $user = Auth::user();
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id) {
        $user = Auth::user();
        $form = $request->all();
        $profileImage = $request->file('profile_image');
        if ($profileImage != null) {
            $form['profile_image'] = $this->saveProfileImage($profileImage, $id);
        }
        unset($form['_token']);
        unset($form['_method']);
        $user->fill($form)->save();
        return redirect('/home');
    }

    private function saveProfileImage($image, $id) {
        $img = \Image::make($image);
        $img->fit(100, 100, function($constraint) {
            $constraint->upsize();
        });
        $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/profiles/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        return $file_name;
    }
}


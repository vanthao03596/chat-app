<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
        public function edit(User $user)
        {
                return view('users.edit', ['user' => $user]);
        }

        public function update($user, Request $request)
        {
                $user= User::find($user);
                if ($request->file('image')) {
                        $file = $request->file('image');
                        $new_name = time() . $file->getClientOriginalName();
                        $file->move(public_path('uploads'), $new_name);
                        $image_path = 'uploads/' . $new_name;
                        $user->image_path = $image_path;
                }
                $user->name = $request->name;
                $user->email = $request->email;
                $user->save();
                return redirect()->route('chatroom');
        }
}

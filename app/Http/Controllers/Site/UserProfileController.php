<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function updateProfile(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/site/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/site'),$filename);
            $data->profile_photo_path = $filename;
        }
        $data->save();
        return redirect()->back()->with(['message' => 'Profile Update Successfully!']);
   
    }

     public function updatePassword(Request $request, $id)
    {
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashPass = User::find($id)->password;
        if (Hash::check($request->oldpassword, $hashPass)){
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back()->with(['message' => 'Current Password dose not match!']);
        }
    }
}

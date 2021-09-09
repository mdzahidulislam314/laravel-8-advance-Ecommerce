<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'admin'=> Auth::guard('admin')->user(),
        ];
        return view('admin.profile.index',$data);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $data = Admin::find(Auth::guard('admin')->user()->id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/admin/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin'),$filename);
            $data->profile_photo_path = $filename;
        }
        $data->save();
        return redirect()->back()->with(['message' => 'Profile Update Successfully!']);
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashPass = Auth::guard('admin')->user()->password;
        if (Hash::check($request->oldpassword, $hashPass)){
            $admin = Admin::find(Auth::guard('admin')->user()->id);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::guard('admin')->logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back()->with(['message' => 'Current Password dose not match!']);
        }
    }
}

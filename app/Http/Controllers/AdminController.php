<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // admin profile page
    public function profile($id) {
        $data = User::where('id', $id)->first();
        return view('admin.layouts.profile',compact('data'));
    }

    // update admin profile
    public function update(Request $request) {
        $data = $this->getUserData($request);
        $this->updateProfileValidationCheck($request);
        if($request->hasFile('image')){
            $dbImage = User::where('id', Auth::user()->id)->first();
            $dbImage = $dbImage->image;
            if($dbImage != null) {
                Storage::delete('public/images/user/'.$dbImage);
            }
            $newImage = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/user',$newImage);
            $data['image'] = $newImage;
        }
        User::where('id', Auth::user()->id)->update($data);
        return redirect()->route('admin#profile', Auth::user()->id)->with(['updateSuccess'=>'Profile updated...']);
    }

    public function delete($id) {
        User::where('id', $id)->delete();
        return redirect()->route('user#list')->with(['deleteUserSuccess'=>"Successfully deleted..."]);
    }

    // change password
    public function changePassword(Request $request) {
        $this->passwordValidationCheck($request);
        $dbPassword = User::select('password')->where('id', Auth::user()->id)->first();
        $dbHashValue = $dbPassword->password;
        // dd($dbHashValue);
        if(Hash::check($request->currentPassword, $dbHashValue)) {
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->newPassword)
            ]);
            return back()->with(['passwordChangeSuccess'=>'Password changed...']);
        }
        return back()->with(['passwordNotMatch' => 'Incorrect Current Password']);
    }

    // password validation check
    private function passwordValidationCheck($request) {
        Validator::make($request->all(), [
            'currentPassword' => 'required|min:8|max:18',
            'newPassword' => 'required|min:8|max:18',
            'confirmPassword' => 'required|min:8|max:18|same:newPassword'
        ])->validate();
    }

    // update profile validation check
    private function updateProfileValidationCheck($request) {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'mimes:png,jpg,webp,jpeg,svg|file'
        ])->validate();
    }

    // get user data
    private function getUserData($request) {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender
        ];
    }
}

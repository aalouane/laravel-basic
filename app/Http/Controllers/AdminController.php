<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    /* Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
    */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    // Show profile page
    public function profile()
    {
        $adminData = Auth::user();

        return view('admin.admin_profile_view', ['admindata' => $adminData]);
    }

    // Show Edit profile form
    public function editProfile()
    {
        $editData = Auth::user();

        return view('admin.admin_profile_edit', ['editdata' => $editData]);
    }

    // Store edit profile form
    public function storeProfile(Request $request)
    {
        // validate data
        $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'username' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
        ]);

        // we can  handle this in view see the laragig project

        $user_id = Auth::id();
        $user = User::find($user_id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->file('image_profile')) {
            $file = $request->file('image_profile');
            $filename = date('YmdHi') . $file->getClientOriginalName();

            $file->move(public_path('upload/admin_images'), $filename);
            $user->profile_image = $filename;
        }

        $user->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    // Show the changePassword view
    public function changePassword()
    {
        return view("admin.change_password");
    }

    // Update the password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldpassword' => ['required'],
            'password'    => ['required', 'min:6', 'confirmed'],
        ]);
        
        $hashPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashPassword)) {
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->password);
            $user->save();

            session()->flash('message', 'Password Updated Successfully');
            return redirect()->back();
        }else {
            session()->flash('message', 'Old password is not match');
            return redirect()->back();
        }
    }
}

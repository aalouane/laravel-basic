<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return redirect('/login');
    }

    // Show profile page
    public function profile()
    {
        $adminData = Auth::user();

        return view('admin.admin_profile_view', ['admindata'=>$adminData]);
    }
    
    // Show Edit profile form
    public function editProfile()
    {
        $editData = Auth::user();

        return view('admin.admin_profile_edit', ['editdata'=>$editData]);
    }

    // Store edit profile form
    public function storeProfile(Request $request) 
    {
        $user = Auth::user();
       
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if($request->file('image_profile'))
        {
            $file = $request->file('image_profile');
            $filename = date('YmdHi'). $file->getClientOriginalName();

            $file->move(public_path('upload/admin_image'), $filename);
        }

    }
    
}


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

    public function profile()
    {
        $adminData = Auth::user();

        return view('admin.admin_profile_view', ['admindata'=>$adminData]);
    }
    
    
    public function editProfile()
    {
        $adminData = Auth::user();

        return view('admin.admin_profile_edit', ['admindata'=>$adminData]);
    }
    
}


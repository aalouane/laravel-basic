<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
  // Show the footer page
  public function footerPage()
  {
    $footer = Footer::first()->get()[0];
    return view('admin.footer.footer', ['footer' => $footer]);
  }


  public function updateFooter(Footer $footer, Request $request)
  {
    // without any validation
    // all fields are optional

    $footer->update([
      'numero' => $request->numero,
      'short_description' => $request->short_description,
      'email' => $request->email,
      'country' => $request->country,
      'adress' => $request->adress,
      'facebook' => $request->facebook,
      'twitter' => $request->twitter,
      'linkedin' => $request->linkedin,
      'behance' => $request->behance,
      'insta' => $request->insta,
      'copyright' => $request->copyright,
    ]);

    $notification = array(
      'message' => 'Footer are updated successfully!!',
      'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
  }


}

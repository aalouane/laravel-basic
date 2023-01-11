<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{

    // Show the edit homeSlider page
    public function aboutPage()
    {
        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all', ['aboutpage' => $aboutpage]);
    }

    // Update about page
    public function updatePage(About $aboutPage, Request $request)
    {
        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(503, 602)->save('upload/home_about/' . $name_gen);

            $save_url = 'upload/home_about/' . $name_gen;

            $aboutPage->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About Page Updated with image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $aboutPage->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'About Page Updated without image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }

    // Show The home about page
    public function homeAbout()
    {
        $aboutpage = About::find(1);
        return view('frontend.home_about', ['aboutpage' => $aboutpage]);
    }

    // Show the mutliImage about page
    public function AboutMultiImage()
    {
        return view('admin.about_page.multimage');
    }

    // Store multi image
    public function storeMultImage(Request $request)
    {
        $images = $request->mutli_image;

        // dd($images);

        foreach($images as $mutli_image)
        {
            $name_gen = hexdec(uniqid()) . '.' . $mutli_image->getClientOriginalExtension();

            Image::make($mutli_image)->resize(220, 220)->save('upload/multi/' . $name_gen);

            $save_url = 'upload/multi/' . $name_gen;

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at'  => Carbon::now(),
            ]);

        }

        $notification = array(
            'message' => 'Multi Image inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

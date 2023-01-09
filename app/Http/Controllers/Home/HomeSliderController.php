<?php

namespace App\Http\Controllers\Home;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    // Show the edit homeSlider page
    public function homeSlider()
    {
        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', ['homeslide' => $homeslide]);
    }

    // Update the homeSlider
    public function updateSlider(HomeSlide $homeslider, Request $request)
    {

        if ($request->file('home_slide')) {
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(636, 852)->save('upload/home_slide/' . $name_gen);

            $save_url = 'upload/home_slide/' . $name_gen;

            $homeslider->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'home_slide' => $save_url,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Slider Updated with image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $homeslider->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Slider Updated without image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
}

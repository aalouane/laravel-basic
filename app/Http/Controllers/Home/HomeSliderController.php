<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    // Show the edit homeSlider page
    public function homeSlider() {
        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', ['homeslide'=>$homeslide]);
    }

    // Update the homeSlider
    public function updateSlider(HomeSlide $homeslider, Request $request) {

        if($request->file('home_slide'))
        {
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        }
    }


}

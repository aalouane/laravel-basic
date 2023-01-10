<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
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
}

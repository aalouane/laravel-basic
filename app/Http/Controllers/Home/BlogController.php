<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
  // Show the all blog page
  public function allBlog()
  {
    $blogs = Blog::latest()->get();
    return view('admin.blog.all_blog', ['blogs' => $blogs]);
  }
}

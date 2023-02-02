<?php

namespace App\Http\Controllers\Home;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;

class BlogController extends Controller
{
  // Show the all blog page
  public function allBlog()
  {
    $blogs = Blog::latest()->get();
    return view('admin.blog.all_blog', ['blogs' => $blogs]);
  }

  // Show the add blog page
  public function addBlog()
  {
    $categories = BlogCategory::orderBy('blogcategory_name', 'ASC')->get(); 
    return view('admin.blog.add_blog', ['categories'=>$categories]);
  }



}

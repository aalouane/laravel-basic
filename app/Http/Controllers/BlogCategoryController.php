<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
  // go to all blog category page
  public function allBlogCategory()
  {
    $blogcategories = BlogCategory::latest()->get();
    return view('admin.category.all_blog_category', ['blogcategories' => $blogcategories]);
  }

  // Show the add blog category page
  public function addBlogCategory()
  {
    return view('admin.category.add_blog_category');
  }
}

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

  // Show the add blog category page
  public function storeBlogCategory(Request $request)
  {
    $request->validate(
      [
        'name' => 'required',
      ],
      ['name.required' => 'Blog Category name is required.']
    );

    BlogCategory::insert([
      'blogcategory_name' => $request->name,
    ]);

    $notification = array(
      'message' => 'BlogCategory inserted Successfully',
      'alert-type' => 'success'
    );

    return redirect()->route('all.blog.category')->with($notification);
  }

  // Show the edit blog category page
  public function editBlogCategory(BlogCategory $blogCategory)
  {
    return view('admin.category.edit_blog_category', ['blogCategory' => $blogCategory]);
  }

  // Update the blog cateogry
  public function updateBlogCategory(BlogCategory $blogCategory, Request $request)
  {
    $request->validate(
      [
        'name' => 'required',
      ],
      [
        'name.required' => 'The blog category name is required'
      ]
    );

    $blogCategory->update([
      'blogcategory_name' => $request->name
    ]);

    $notification = array(
      'message' => 'BlogCategory updated Successfully',
      'alert-type' => 'success'
    );

    return redirect()->route('all.blog.category')->with($notification);
  }

  // Delete the blog category
  public function deleteBlogCategory(BlogCategory $blogCategory)
  {
    BlogCategory::destroy($blogCategory->id);

    $notification = array(
      'message' => 'BlogCategory deleted Successfully',
      'alert-type' => 'success'
    );

    return redirect()->route('all.blog.category')->with($notification);
  }
  
}

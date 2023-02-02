<?php

namespace App\Http\Controllers\Home;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

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
    return view('admin.blog.add_blog', ['categories' => $categories]);
  }

  public function storeBlog(Request $request)
  {
    // dd("qsldkfjj");
    $request->validate(
      [
        'title' => 'required',
        'blog_category' => 'required',
        'image' => 'required'
      ],
      [
        'title.required' => 'The blog title is required',
        'blog_category.required' => 'The blog category is required, choose a category',
        'image.required' => 'The blog image is required'
      ]
    );

    $image = $request->file('image');
    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

    Image::make($image)->resize(430, 327)->save('upload/blog' . $name_gen);
    $save_url = 'upload/blog' . $name_gen;

    Blog::insert(
      [
        'blog_category_id' => $request->blog_category,
        'blog_title' => $request->title,
        'blog_tags' => $request->tags,
        'blog_image' => $save_url,
        'blog_description' => $request->description,
        'created_at' => Carbon::now()
      ]
    );

    $notification = array(
      'message' => 'Blog inserted Successfully',
      'alert-type' => 'success'
    );

    return redirect()->route('all.blog')->with($notification);
  }

  public function editBlog(Blog $blog)
  {
    $categories = BlogCategory::orderBy('blogcategory_name', 'ASC')->get();
    return view('admin.blog.edit_blog', ['blogcategory' => $categories, 'blog' => $blog]);
  }


  public function updateBlog(Request $request, Blog $blog)
  {

    // dd("qsldkfjj");
    $request->validate(
      [
        'title' => 'required',
        'blog_category' => 'required',
        'image' => 'required'
      ],
      [
        'title.required' => 'The blog title is required',
        'blog_category.required' => 'The blog category is required, choose a category',
        'image.required' => 'The blog image is required'
      ]
    );

    $image = $request->file('image');
    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

    Image::make($image)->resize(430, 327)->save('upload/blog' . $name_gen);
    $save_url = 'upload/blog' . $name_gen;

    $blog->update(
      [
        'blog_category_id' => $request->blog_category,
        'blog_title' => $request->title,
        'blog_tags' => $request->tags,
        'blog_image' => $save_url,
        'blog_description' => $request->description,
        'created_at' => Carbon::now()
      ]
    );

    $notification = array(
      'message' => 'Blog updated Successfully',
      'alert-type' => 'success'
    );

    return redirect()->route('all.blog')->with($notification);
  }
}

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
    return view('admin.blog.edit_blog', ['categories' => $categories, 'blog' => $blog]);
  }


  public function updateBlog(Request $request, Blog $blog)
  {

    $request->validate(
      [
        'title' => 'required',
        'blog_category' => 'required',
        // 'image' => 'required'
      ],
      [
        'title.required' => 'The blog title is required',
        'blog_category.required' => 'The blog category is required, choose a category',
        'image.required' => 'The blog image is required'
      ]
    );

    // dd($blog);
    if ($request->file('image')) {
      $image = $request->file('image');
      $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

      Image::make($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
      $save_url = 'upload/blog/' . $name_gen;

      $blog->update(
        [
          'blog_category_id' => $request->blog_category,
          'blog_title' => $request->title,
          'blog_tags' => $request->tags,
          'blog_image' => $save_url,
          'blog_description' => $request->description,
        ]
      );
    } else {

      $blog->update(
        [
          'blog_category_id' => $request->blog_category,
          'blog_title' => $request->title,
          'blog_tags' => $request->tags,
          'blog_description' => $request->description,
        ]
      );
    }

    $notification = array(
      'message' => 'Blog updated Successfully',
      'alert-type' => 'success'
    );

    return redirect()->route('all.blog')->with($notification);
  }

  public function deleteBlog(Blog $blog)
  {
    Blog::destroy($blog->id);
    unlink($blog->blog_image);

    $notification = array(
      'message' => 'Blog deleted Successfully',
      'alert-type' => 'success'
    );

    return redirect()->route('all.blog')->with($notification);
  }

  // Front end pages

  // Show blog details page
  public function blogDetails(Blog $blog)
  {
    $allblogs = Blog::latest()->limit(5)->get();
    $categories = BlogCategory::orderBy('blogcategory_name', 'ASC')->get();
    return view('frontend.blog_details', [
      'blog' => $blog,
      'allblogs' => $allblogs,
      'categories' => $categories
    ]);
  }

  public function categoryBlogs(BlogCategory $blogCategory)
  {
    $blogs = Blog::where('blog_category_id', $blogCategory->id)->orderBy('id', 'DESC')->get();
    $allblogs = Blog::latest()->limit(5)->get();
    $categories = BlogCategory::orderBy('blogcategory_name', 'ASC')->get();
    return view(
      'frontend.cat_blog_details',
      [
        'blogs' => $blogs,
        'allblogs' => $allblogs,
        'categories' => $categories,
        'blogCategory' => $blogCategory
      ]
    );
  }

  // display all blogs
  public function homeBlog()
  {
    $allblogs = Blog::latest()->get();
    $categories = BlogCategory::orderBy('blogcategory_name', 'ASC')->get();
    return view(
      'frontend.blogs',
      [
        'allblogs' => $allblogs,
        'categories' => $categories,
      ]
    );
  }
}

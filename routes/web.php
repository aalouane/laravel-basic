<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Frontend Routes
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('/', function () {
  return view('frontend.index');
});


// End Frontend Routes
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



// Backend Routes
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('/dashboard', function () {
  return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AdminController::class)->group(function () {
  Route::get('/admin/logout', 'destroy')->name('admin.logout');
  Route::get('/admin/profile', 'profile')->name('admin.profile');

  Route::get('/edit/profile', 'editProfile')->name('profile.edit');
  Route::post('/store/profile', 'storeProfile')->name('profile.store');

  Route::get('/change/password', 'changePassword')->name('change.password');
  Route::post('/update/password', 'updatePassword')->name('update.password');
});


Route::controller(HomeSliderController::class)->group(function () {
  Route::get('/home/slider', 'homeSlider')->name('home.slide');
  Route::post('/update/slider/{homeslider}', 'updateSlider')->name('update.slider');
});


Route::controller(AboutController::class)->group(function () {
  Route::get('/about/page', 'aboutPage')->name('about.page');
  Route::post('/update/about/{aboutPage}', 'updatePage')->name('update.about');
  Route::get('/about', 'homeAbout')->name('home.about');

  Route::get('/about/image', 'AboutMultiImage')->name('about.multi.image');

  Route::post('/store/multi/image', 'storeMultImage')->name('store.multi.image');

  Route::get('/all/multi/image', 'allMultImage')->name('all.multi.image');
  Route::get('/edit/multi/image/{image}', 'editMultiImage')->name('edit.multi.image');
  Route::post('/update/multi/image/{image}', 'updateMultiImage')->name('update.multi.image');
  Route::get('/delete/multi/image/{image}', 'deleteMultiImage')->name('delete.multi.image');
});


Route::controller(PortfolioController::class)->group(function () {
  Route::get('/all/portfolio', 'allPortfolio')->name('all.portfolio');
  Route::get('/add/portfolio', 'addPortfolio')->name('add.portfolio');
  Route::post('/store/portfolio', 'storePortfolio')->name('store.portfolio');
  Route::get('/edit/portfolio/{portfolio}', 'editPortfolio')->name('edit.portfolio');
  Route::post('/update/portfolio/{portfolio}', 'updatePortfolio')->name('update.portfolio');
  Route::get('/delete/portfolio/{portfolio}', 'deletePortfolio')->name('delete.portfolio');
  Route::get('/portfolio/details/{portfolio}', 'detailsPortfolio')->name('portfolio.details');
});

Route::controller(BlogCategoryController::class)->group(function () {
  Route::get('/all/blog/category', 'allBlogCategory')->name('all.blog.category');
  Route::get('/add/blog/category', 'addBlogCategory')->name('add.blog.category');
  Route::post('/store/blog/category', 'storeBlogCategory')->name('store.blog.category');
  Route::get('/edit/blog/category/{blogCategory}', 'editBlogCategory')->name('edit.blog.category');
  Route::post('/update/blog/category/{blogCategory}', 'updateBlogCategory')->name('update.blog.category');
  Route::get('/delete/blog/category/{blogCategory}', 'deleteBlogCategory')->name('delete.blog.category');
  // Route::get('/portfolio/details/{portfolio}', 'detailsPortfolio')->name('portfolio.details');
});


Route::controller(BlogController::class)->group(function () {
  Route::get('/all/blog', 'allBlog')->name('all.blog');
  Route::get('/add/blog', 'addBlog')->name('add.blog');
  Route::post('/store/blog', 'storeBlog')->name('store.blog');
  Route::get('/edit/blog/{blog}', 'editBlog')->name('edit.blog');
  Route::post('/update/blog/{blog}', 'updateBlog')->name('update.blog');
  Route::get('/delete/blog/{blog}', 'deleteBlog')->name('delete.blog');

  Route::get('/blog/details/{blog}', 'blogDetails')->name('blog.details');
  Route::get('/category/blogs/{blogCategory}', 'categoryBlogs')->name('category.blogs');

  Route::get('/home/blog', 'homeBlog')->name('home.blog');
  // Route::get('/portfolio/details/{portfolio}', 'detailsPortfolio')->name('portfolio.details');
});


Route::controller(FooterController::class)->group(function () {
  Route::get('/footer', 'footerPage')->name('footer');
  Route::post('/update/footer/{footer}', 'updateFooter')->name('update.footer');
});

// all . blog_ctegory

// End Backend Routes
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// Route::middleware('auth')->group(function () {
//     // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
  public function allPortfolio()
  {
    $portfolios = Portfolio::latest()->get();
    return view('admin.portfolio.portfolio_all', ['portfolios' => $portfolios]);
  }

  public function addPortfolio()
  {
    return view('admin.portfolio.add_portfolio');
  }

  public function storePortfolio(Request $request)
  {
    $request->validate(
      [
        'name' => 'required',
        'title' => 'required',
        'image' => 'required'
      ],
      [
        'name.required' => 'Portfolio name is required',
        'title.required' => 'Portfolio title is required',
      ]
    );

    $image = $request->file('image');
    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

    Image::make($image)->resize(1020, 519)->save('upload/portfolio/' . $name_gen);

    $save_url = 'upload/portfolio/' . $name_gen;

    Portfolio::insert([
      'portfolio_name' => $request->name,
      'portfolio_title' => $request->title,
      'portfolio_description' => $request->description,
      'portfolio_image' => $save_url,
      'created_at' => Carbon::now(),
    ]);

    $notification = array(
      'message' => 'Portfolio inserted Successfully',
      'alert-type' => 'success'
    );

    return redirect()->route('all.portfolio')->with($notification);
  }

  // show the portfolio edit page
  public function editPortfolio(Portfolio $portfolio)
  {
    return view('admin.portfolio.edit_portfolio', ['portfolio' => $portfolio]);
  }

  // Update portfolio
  public function updatePortfolio(Request $request, Portfolio $portfolio)
  {
    $request->validate(
      [
        'name' => 'required',
        'title' => 'required',
        // 'image' => 'required'
      ],
      [
        'name.required' => 'Portfolio name is required',
        'title.required' => 'Portfolio title is required',
      ]
    );
    if ($request->file('image')) {

      $image = $request->file('image');
      $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

      Image::make($image)->resize(1020, 519)->save('upload/portfolio/' . $name_gen);

      $save_url = 'upload/portfolio/' . $name_gen;

      $portfolio->update([
        'portfolio_name' => $request->name,
        'portfolio_title' => $request->title,
        'portfolio_description' => $request->description,
        'portfolio_image' => $save_url,
      ]);

      $notification = array(
        'message' => 'Portfolio updated with image Successfully',
        'alert-type' => 'success'
      );

    }else {
    
      $portfolio->update([
        'portfolio_name' => $request->name,
        'portfolio_title' => $request->title,
        'portfolio_description' => $request->description,
      ]);

      $notification = array(
        'message' => 'Portfolio updated without image Successfully',
        'alert-type' => 'success'
      );
    }

    return redirect()->route('all.portfolio')->with($notification);
  }

  public function deletePortfolio(Portfolio $portfolio)
  {
    unlink($portfolio->portfolio_image);
    Portfolio::destroy($portfolio->id);

    $notification = array(
      'message' => 'Portfolio Deleted Successfully',
      'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
  }
}

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
  public function allPortfolio()
  {
    $portfolios = Portfolio::latest()->get();
    return view('admin.portfolio.portfolio_all', ['portfolios'=>$portfolios]);
  }

  public function addPortfolio()
  {
    return view('admin.portfolio.add_portfolio');
  }

  public function storePortfolio(Request $request){
    $request->validate([
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
      'name' => $request->name,
      'title' => $request->title,
      'description' => $request->description,
      'image' => $save_url,
      'created_at' => Carbon::now(),
    ]);

    $notification = array(
      'message' => 'Portfolio inserted Successfully',
      'alert-type' => 'success'
    );

    return redirect()->route('all.portfolio')->with($notification);
  }
}

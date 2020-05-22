<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Http\Resources\productResource;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prod = Product::where("status", "Approved")->limit(10)->orderByDesc('id')->get();
        return view('welcome', compact('prod'));
    }

    public function shop()
    {
        $prod = Product::where("status", "Approved")->paginate(50);
        return view('shop', ['prod'=> $prod]);
    }

    public function customize($id)
    {

        $prod = Product::where("status", "Approved")->paginate(50);
        return view('shop', ['prod'=> $prod]);
    }

    public function details($id)
    {
        $related = Product::where("status", "Approved")->limit(4)->orderByDesc('id')->get();
        $details = Product::find($id);
        return view('product-details', ['details'=> $details, 'related'=> $related]);
    }

    public function productRating(Request $request)
    {
    request()->validate(['rate' => 'required']);
    $product = Product::find($request->id);
    $rating = new \willvincent\Rateable\Rating;
    $rating->rating = $request->rate;
    $rating->user_id = auth()->user()->id;
    $rating->product_id = $request->id;
    $product->ratings()->save($rating);
    return redirect()->route("review");
    }

}

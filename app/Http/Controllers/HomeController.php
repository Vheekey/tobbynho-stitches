<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Support\Facades\App;
use App\Http\Resources\productResource;
use App\Order;
use App\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

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
        $prod = Product::find($id);
        return view('product', ['prod'=> $prod]);
    }

    public function details($id)
    {
        $related = Product::where("status", "Approved")->limit(4)->orderByDesc('id')->get();
        $details = Product::find($id);
        return view('product-details', ['details'=> $details, 'related'=> $related]);
    }

    public function addToCartUncustomized(Request $request)
    {

        $validation = $request->validate([
            'quantity' => 'required|numeric',
        ]);
        if(empty($request->size)) return back()->with("error", "Kindly choose a size");
        if(empty($request->quantity) || ($request->quantity < 1)) return back()->with("error", "Kindly choose a valid quantity");

        // get new session token
        $new_session_token = session()->get('_token');
        $session_id = session()->getId();

        $cart = new Cart();
        $product = Product::find($request->product_id);
        if(empty($product)) return back()->with("error", "Product could not be found");
        $cart->product_id = $request->product_id;
        $cart->vendor_id = $product->vendor_id;
        $cart->size = $request->size;
        $cart->quantity = $request->quantity;
        $cart->session_token = $new_session_token;
        $cart->session_id = $session_id;

        if(empty(session()->get('cart'))) session()->put('cart', []);
        $requested['product_id'] = $request->product_id;
        $requested['vendor_id'] = $product->vendor_id;
        $requested['quantity'] = $request->quantity;
        $requested['_token'] = $request->_token;
        $requested['image'] = $product->productImage;
        $requested['name'] = $product->product;
        $requested['cost'] = $product->discount;
        $requested['size'] = $request->size;
        $requested['total'] = $request->quantity * $product->discount;
        $request->session()->push('cart', $requested);

        session()->save();
        $cart->save();

        return back()->with("success", "Added to Cart");

        // ;
        // return $session_id;
    }

    public function displayCart(Request $request)
    {
        if($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');

            return $cart;
        }


    }

    // public function addToFavourites(Request $request)
    // {
    //     $order = new Order();
    //     $order->product_id = $request->product_id;
    //     $order->user_id = auth()->user()->id;
    //     $order->product_id = $request->product_id;
    //     $order->vendor_id = $request->products->vendors->id;
    //     $order->size = $request->size;
    //     $order->quantity = $request->quantity;
    //     $order->status = "Awaiting Confirmation";
    //     $order->customized = 0;
    //     $order->save();
    //     return back()->with("success", "Added to Cart");
    // }

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

<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    //
    // protected function guard()
    // {
    //     return \Auth::guard('vendor');
    // }
    public function index(){
        return view('vendor.dashboard')->with('success', 'You are logged in as a Vendor');
    }

    public function products(){
        $all = Product::paginate(20);
        return view('vendor.manage-products', compact('all'));
    }

    public function createProduct(Request $request){
        // $request->validate([
        //     'productImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        if($request->price < $request->discount) return back()->with('error', 'Discount Price is greater than Actual Price');
        $product = new Product;
        $vendor_id = Auth::guard('vendor')->id();
        $product->vendor_id = $vendor_id;
        $product->product = $request->product_name;
        $product->description = $request->desc;
        $product->material = $request->product_material;
        $product->productImage = $request->file('productImage')->store('productImages', 'public');
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->status = "Pending";
        // return $product;

        $product->save();
        return back()->with('success', 'Product Created');
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return back()->with('success', 'Product Deleted');
    }

    public function editProduct($id){
        $product = Product::find($id);
        return view('vendor.edit', compact('product'));
    }

    public function updateProduct($id, Request $request){
        if($request->newPrice < $request->newDiscount) return back()->with('error', 'Discount Price is greater than Actual Price');
        //$id = $request->id;
        $product = Product::find($id);
        $vendor_id = Auth::guard('vendor')->id();
        if($product->vendor_id == $vendor_id){
            $product->product = $request->newProduct;
            $product->description = $request->newDescription;
            $product->material = $request->newMaterial;
            if(!empty($request->file('newImage'))) $product->productImage = $request->file('newImage')->store('productImages', 'public');
            $product->price = $request->newPrice;
            $product->discount = $request->newDiscount;

            $product->save();
            return back()->with('success', 'Product Updated');
        }
        return back()->with('success', 'Product Update Failed');
    }
}

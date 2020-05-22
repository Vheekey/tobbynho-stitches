<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class AdminController extends Controller
{
    //
    public function index(){
        $all = Product::where("status",'=',"Pending")->get();
        return view('admin/admin', compact('all'))->with('success', 'You are logged in as a Admin');
    }

    //view customers
    public function customers(){
        $customers = \DB::table('users')->get();
        return view('admin/customers', compact('customers'));
    }

    //delete customer account
    public function deleteCustomer($id){
        \DB::table('users')->where('id', '=', $id)->delete();
        return  back()->with('success', 'Account Deleted');
    }

    //admin view faq
    public function faq(){
        $faq = \DB::table('faqs')->get();
        return view('admin/faq', compact('faq'));
    }

    //admin create faq
    public function createFaq(Request $request){
        $que = $request->que;
        $ans = $request->ans;
        \DB::table('faqs')->insert(['question' => $que, 'answer' => $ans] );
        return  back()->with('success', 'Faq created successfully');
    }

    //admin delete faq
    public function deleteFaq($id){
        \DB::table('faqs')->where('id', '=', $id)->delete();
        return  back()->with('success', 'Faq deleted successfully');
    }

    //admin get faq
    public function getFaq($id){
        $data = \DB::table('faqs')->where('id', $id)->get();
        return view('admin/faqEdit', compact('data'));
    }

    //admin edit faq
    public function editFaqs(Request $request, $id){
        $data = \DB::table('faqs')->where('id', $id)->update(['question' => $request->que, 'answer' => $request->ans]);
        return  back()->with('success', 'Faq updated successfully');
    }

    //admin manage products
    public function products(){
        $all = Product::paginate(100);
        return view('admin/products', compact('all'));
    }

    //admin approve products
    public function approveProducts($id){
        $product = Product::where("id",$id)->first();
        //return $product;
        if($product->status == 'Pending' || $product->status == 'Declined'){
            $product->status = "Approved";
            $product->save();
            return back()->with('success', 'Product Approved');
        }
        return back()->with('error', 'Approval Failed');

    }

    //admin decline products
    public function declineProducts($id){
        $product = Product::where("id",$id)->first();
        if($product->status == 'Pending' || $product->status == 'Approved'){
            $product->status = "Declined";
            $product->save();
            return back()->with('success', 'Product Declined');
        }
        return back()->with('error', 'Decline Failed');

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.admin')->with('success', 'You are logged in as a Admin');
    }

    //view customers
    public function customers(){
        $customers = \DB::table('users')->get();
        return view('admin.customers', compact('customers'));
    }

    //delete customer account
    public function deleteCustomer($id){
        \DB::table('users')->where('id', '=', $id)->delete();
        return  back()->with('success', 'Account Deleted');
    }

    //admin view faq
    public function faq(){
        $faq = \DB::table('faqs')->get();
        return view('admin.faq', compact('faq'));
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

    //admin edit faq
    public function editFaqs(Request $request){
        return  response()->json(['data'=> $request]);
        return $request;
        $id = $request->id;
        return "kkkkkkkkk";
        $data = \DB::table('faqs')->where('id', '=', $id)->get();
        return  response()->json(['data'=> $data]);
    }
}

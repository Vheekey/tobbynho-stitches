<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}

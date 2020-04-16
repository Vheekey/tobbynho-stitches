<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Vendor;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Foundation\Auth\RegistersUsers;
use \Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Validator;
use \Illuminate\Http\Request;

class VendorRegisterController extends Controller
{
    //
    protected function vendorValidator($data){
        return \Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
}
 
    public function createVendor(Request $request)
    {    
        //vendor validation
    
        $this->vendorValidator($request->all())->validate();    
        $vendor = Vendor::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        if (\Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return view('vendor.dashboard')->with('success', ' Welcome Vendor '.$request->email);
        }
        return redirect()->intended('/vendor/signup');
        
    }
}

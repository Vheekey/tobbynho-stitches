<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorLoginController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('guest:vendor')->except('logout'); //allow only logout route to access this controller and that is not defined
        $this->middleware('guest:vendor')->except('vendorLogout'); 
        
    }
    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }  
     

    public function vendorLogin(Request $request)
    {
        $this->validate($request, [
            'vendorEmail'    => 'required|email',
            'vendorPassword' => 'required|string|min:4|max:255',
        ]);
        
        if(\Auth::guard('vendor')->attempt(['email' => $request->vendorEmail, 'password' => $request->vendorPassword], $request->only('vendorEmail','vendorPassword'),$request->filled('remember'))){
            //Authentication passed...
            return redirect('/vendor/dashboard');                 
        }
        //Authentication failed...
        return back()->with('error', 'Login failed. Kindly confirm credentials') ;
    }

   

    public function vendorLogout(){
        \Auth::guard('vendor')->logout();
        return redirect('/')
            ->with('success','Vendor Logout successful!');            
           
    }

}

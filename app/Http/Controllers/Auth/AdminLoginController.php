<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('guest:admin')->except('adminLogout'); //allow only logout route to access this controller and that is not defined
        
    } 
     
     public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'adminEmail'    => 'required|email',
            'adminPassword' => 'required|string|min:4|max:255',
        ]);
        
        if(\Auth::guard('admin')->attempt(['email' => $request->adminEmail, 'password' => $request->adminPassword], $request->only('adminEmail','adminPassword'),$request->filled('remember'))){
            //Authentication passed...
            return redirect('/admin/admin')->with('success', 'Welcome Admin');                 
        }
        //Authentication failed...
        return back()->with('error', 'Login failed. Kindly confirm credentials') ;
    }

    public function adminLogout(){
        //return  "boo";
        \Auth::guard('admin')->logout();
        // \Auth::logout();
        // $request->session()->invalidate();
        return redirect('/')
            ->with('success','Admin logout successful!');
                    
           
    }
}

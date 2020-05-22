<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Admin;
use App\Product;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Foundation\Auth\RegistersUsers;
use \Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Validator;
use \Illuminate\Http\Request;

class AdminRegisterController extends Controller
{
    //
    protected function adminValidator($data){
        return \Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    public function createAdmin(Request $request)
    {
        //vendor validation

        $this->adminValidator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        if (\Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $all = Product::where("status",'=',"Pending")->get();
            return view('admin.admin', compact('all'))->with('success', $request->name.' Admin signup successful!');
        }
        return redirect()->intended('/admin/sign');

    }
}

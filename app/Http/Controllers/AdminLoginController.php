<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){

        return view('admin.login');
    }
public function login( Request $request){

    $this->validate($request,[
'email'=>'required|email',
'password'=>'required|min:6'
    ]);
if(Auth::guard('admin')->attempt(['email'=>$request->email,
'password'=>$request->password],$request->remember)){

    return redirect()->intended(route('admin.home'));

}else{

return redirect()->back()->withErrors($request->all());
}
}

public function showSignup(){

    return view('admin.register');
}

 public function signup(Request $data){
     $this->validate($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    Admin::create([
        'name' => $data->input('name'),
        'email' => $data->input('email'),
        'password' => Hash::make($data->input('password')),
    ]);
    return redirect()->intended(route('admin.home'));
 }








}

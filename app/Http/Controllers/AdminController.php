<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;


class AdminController extends Controller
{
    //
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
                return redirect('/admin/dashboard');
            }else{
               return redirect()->back()->with('flash_message_error','Invalid Email or Password');
            }
        }
        return view('admin.login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(){
        Session::flush();
        return redirect('admin')->with('flash_message_success','Successfully Logged out');

    }
}

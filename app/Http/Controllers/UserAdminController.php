<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SuperAdmin;
use App\Models\AdminProfile;
use App\Models\superadminAddAdmin;
use App\Models\superadminEmployee;

use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    function UserAdminlogin(){
        return view('userAdmin.login');
    } 
    function ForgotPassword(){
        return view('forgot_password');
    }
    
    function ResetPassword(){
        return view('reset_password');
    }

    function check(Request $request){
        //Validate requests 
        $request->validate([
             'email'=>'required',
             'password'=>'required',
        ]);

        $userInfo = superadminAddAdmin::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUserAdmin', $userInfo->id);
                return redirect()->route('userAdmin.index');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedUserAdmin')){
            session()->pull('LoggedUserAdmin');
            return redirect()->route('userAdmin.login');

        }
    }

    function UserAdminIndex(){
        $data = ['LoggedUserInfo'=>superadminAddAdmin::where('id','=', session('LoggedUserAdmin'))->first()];
        return view('userAdmin.Index', $data);
    }
}

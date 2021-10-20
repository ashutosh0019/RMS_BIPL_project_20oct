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
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('userAdmin/index');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/userAdmin/login');
        }
    }

    function UserAdminIndex(){
        $data = ['LoggedUserInfo'=>SuperAdmin::where('id','=', session('LoggedUser'))->first()];
        return view('userAdmin.Index', $data);
    }
}

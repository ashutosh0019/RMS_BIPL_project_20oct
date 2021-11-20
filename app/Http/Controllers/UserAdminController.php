<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SuperAdmin;
use App\Models\AdminProfile;
use App\Models\superadminAddAdmin;
use App\Models\superadminEmployee;
use App\Models\UserAdminEmployee;


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
    
    function userAdminEmployee(){
        return view('userAdmin.employee');
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
    function userAdminAddEmployee(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'mobile'=>'required|min:10|max:10',
            'password'=>'required|min:5|max:30',

        ]);
        
        $kitchen[] = $request->kitchen; 
        $newKitchen = [];
        foreach($kitchen as $key=>$kitchen){
            $newKitchen[$key] = implode(',',$kitchen);
        }

        $order[] = $request->order;
        $newOrder=[];
        foreach($order as $odr=>$order){
            $newOrder[$odr] = implode(',',$order);
        } 

        $product[] = $request->product;
        $newProduct=[];
        foreach($product as $pro=>$product){
            $newProduct[$pro] = implode(',',$product);
        }

        $vendor[] = $request->vendor;
        $newVendor=[];
        foreach($vendor as $vndr=>$vendor){
            $newVendor[$vndr] = implode(',',$vendor);
        }       
        // dd($newKitchen[0]);

        
        $user = new UserAdminEmployee();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->mobile= $request->mobile;
        $user->password= \Hash::make($request->password);

        $user->kitchen= $newKitchen[0];
        $user->order= $newOrder[0];
        $user->product= $newProduct[0];
        $user->vendor= $newVendor[0]; 
                 
        $save=$user->save();

        if($save){
            return redirect()->back()->with('success','You Will Registered Successfully');            
        }
        else{
            return redirect()->back()->with('fail','Something Went Wrong, Failed To Register');            

        }

    }
}

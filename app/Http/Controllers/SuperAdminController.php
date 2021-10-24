<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperAdmin;
use App\Models\AdminProfile;
use App\Models\superadminAddAdmin;
use App\Models\superadminEmployee;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class SuperAdminController extends Controller
{   
    function index(){
        return view('index');
    }
    function superAdminlogin(){
        return view('superAdmin.login');
    }
    function superAdminRegister(){
        return view('superAdmin.register');
    }
    function Employee(){
        return view('superAdmin.employees.add_employee');
    }
    function Admin(){
        return view('superAdmin.admin.add_admin');
    }
    function EmployeeList(){
        return view('superAdmin.employees.list_employee');
    }
    function save(Request $request){
        
        //Validate requests
        $request->validate([
            'username'=>'required',
            'user_Id'=>'required|email|unique:super_admins',
            'password'=>'required|min:5|max:12'
        ]);
    
    

         //Insert data into database
         $superAdmin = new SuperAdmin;
         $superAdmin->username = $request->username;
         $superAdmin->user_Id = $request->user_Id;
         $superAdmin->password = Hash::make($request->password);
         $save = $superAdmin->save();

         if($save){
            return back()->with('success','New User has been successfuly added to database');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }

    function check(Request $request){
        //Validate requests 
        $request->validate([
             'user_Id'=>'required',
             'password'=>'required',
        ]);

        $userInfo = SuperAdmin::where('user_Id','=', $request->user_Id)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect()->route('superAdmin.index');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect()->route('superAdmin.login');
        }
    }

    function SuperAdminIndex(){
        $data = ['LoggedUserInfo'=>SuperAdmin::where('id','=', session('LoggedUser'))->first()];
        return view('superAdmin.index', $data );
    }
    function index_signup(Request $request){
        $signup = new AdminProfile;
        $signup->name    = $request->name;
        $signup->email   = $request->email;
        $signup->mobile   = $request->mobile;
        $signup->password = $request->password;
        $signup->save();
        if(!$signup){
            return response()->json(['code'=>0,'msg'=>'Something went wrong']);
        }else{
            return response()->json(['code'=>1,'msg'=>'New User has been successfully saved']);
        }
    
    }
    function SuperAdminAddNewAdmin(Request $request){

        //Validate requests
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required|email|unique:super_admins',
        //     'mobile'=>'required|min:10|max:10',
        //     'password'=>'required|min:5|max:12',
        // ]);  
    

        $signup = new superadminAddAdmin;
        $signup->name    = $request->name;
        $signup->email   = $request->email;
        $signup->mobile   = $request->mobile;
        $signup->password = Hash::make($request->password);
        $signup->save();
        if(!$signup){
            return response()->json(['code'=>0,'msg'=>'Something went wrong']);
        }else{
            return response()->json(['code'=>1,'msg'=>'New User has been successfully saved']);
        }
    
    }
    function SuperAdminAddEmployee(Request $request){

        //Validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:super_admins',
            'mobile'=>'required|min:10|max:10',
            'password'=>'required|min:5|max:12',
        ]);
    
        $signup = new superadminEmployee;
        $signup->name    = $request->name;
        $signup->email   = $request->email;
        $signup->mobile   = $request->mobile;
        $signup->password = Hash::make($request->password);
        $signup->save();
        if(!$signup){
            return response()->json(['code'=>0,'msg'=>'Something went wrong']);
        }else{
            return response()->json(['code'=>1,'msg'=>'New User has been successfully saved']);
        }
    
    }
    
    function AdminList(){
        // return view('superAdmin.admin.list_admin');
        $adminListData = DB::table('superadmin_add_admins')->get();
        // // $adminListData = superadminAddAdmin::all();                                         
        

        return view('superAdmin.admin.list_admin', ['superadmin_add_admins'=>$adminListData]);
       
    }

    function ChangeUserStatus(Request $request){
        $user = superadminAddAdmin::find($request->id);
        $user->status = $request->status;
        $user->save();
  
        // return response()->json(['success'=>'User status change successfully.']);
    }
    
}

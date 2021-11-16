<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAdminEmployeeController extends Controller
{
    function employeeIndex(){
        return view('userAdmin.employee.index');
    }
    function employeeVendor(){
        return view('userAdmin.employee.vendor');
    }
    function employeeKitchen(){
        return view('userAdmin.employee.kitchen');
    }    
    function employeeProduct(){
        return view('userAdmin.employee.product');
    }    
    function employeeOrder(){
        return view('userAdmin.employee.order');
    }
}

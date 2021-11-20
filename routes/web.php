<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserAdminEmployeeController;



Route::get('/',[SuperAdminController::class, 'index'])->name('index');

// Route::get('/index',[SuperAdminController::class, 'index'])->name('index');

Route::post('/index/signup',[SuperAdminController::class, 'index_signup'])->name('index.signup');

Route::post('/superAdmin/save',[SuperAdminController::class, 'save'])->name('superAdmin.save');
Route::post('/superAdmin/check',[SuperAdminController::class, 'check'])->name('superAdmin.check');
Route::get('/superAdmin/logout',[SuperAdminController::class, 'logout'])->name('superAdmin.logout');
Route::get('/changeStatus', [SuperAdminController::class, 'ChangeUserStatus'])->name('changeStatus');

Route::get('/superAdmin/admin/index', [SuperAdminController::class, 'UserAdmin'])->name('superAdmin.admin.index');
Route::post('/superAdmin/admin/index', [SuperAdminController::class, 'AddUserAdmin'])->name('superAdmin.admin.index');

Route::get('/superAdmin/employees/index', [SuperAdminController::class, 'AdminEmployee'])->name('superAdmin.employees.index');
Route::get('/superAdminEmpList', [SuperAdminController::class, 'AdminEmployeeList'])->name('superAdmin.employees.list');

Route::post('/superAdmin/employees/index', [SuperAdminController::class, 'AddAdminEmployee'])->name('superAdmin.employees.index');
// Route::get('/superAdmin/employees/index',[SuperAdminController::class, 'EmployeeList']);


Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/superAdmin/login',[SuperAdminController::class, 'superAdminlogin'])->name('superAdmin.login');
    Route::get('/superAdmin/index',[SuperAdminController::class, 'SuperAdminIndex'])->name('superAdmin.index');
    Route::get('/superAdmin/register',[SuperAdminController::class, 'superAdminRegister'])->name('superAdmin.register');
    Route::get('/superAdmin/employees/add_employee',[SuperAdminController::class, 'Employee']);
    Route::post('/superadmin/add_employee',[SuperAdminController::class, 'SuperAdminAddEmployee'])->name('superadmin.add_employee');
    Route::get('/superAdmin/employees/list_employee',[SuperAdminController::class, 'EmployeeList']);

    Route::get('/superAdmin/admin/add_admin',[SuperAdminController::class, 'Admin']);
    Route::post('/superadmin/add_new_Admin',[SuperAdminController::class, 'SuperAdminAddNewAdmin'])->name('superadmin.add_new_Admin');
    Route::get('/superAdmin/admin/list_admin',[SuperAdminController::class, 'AdminList'])->name('superAdmin.admin.list_admin');

    

});


Route::post('/userAdmin/check',[UserAdminController::class, 'check'])->name('userAdmin.check');
Route::get('/userAdmin/logout',[UserAdminController::class, 'logout'])->name('userAdmin.logout');
Route::post('/userAdmin/save',[UserAdminController::class, 'save'])->name('userAdmin.save');
Route::get('/forgot_password',[UserAdminController::class, 'ForgotPassword'])->name('forgot_password');
Route::get('/reset_password',[UserAdminController::class, 'ResetPassword'])->name('reset_password');


Route::group(['middleware'=>['UserAdminAuthCheck']], function(){

    Route::get('/userAdmin/login',[UserAdminController::class, 'UserAdminlogin'])->name('userAdmin.login');

    Route::get('/userAdmin/index',[UserAdminController::class, 'UserAdminIndex'])->name('userAdmin.index');
    Route::get('/userAdmin/employee',[UserAdminController::class, 'userAdminEmployee'])->name('userAdmin.employee');
    Route::post('/userAdmin/employee',[UserAdminController::class, 'userAdminAddEmployee'])->name('userAdmin.employee');



});



//user admin employee route
Route::get('/userAdmin/employee/login',[UserAdminEmployeeController::class, 'employeeLogin'])->name('userAdmin.employee.login');

Route::get('/userAdmin/employee/index',[UserAdminEmployeeController::class, 'employeeIndex'])->name('userAdmin.employee.index');
Route::get('/userAdmin/employee/vendor',[UserAdminEmployeeController::class, 'employeeVendor'])->name('userAdmin.employee.vendor');
Route::get('/userAdmin/employee/kitchen',[UserAdminEmployeeController::class, 'employeeKitchen'])->name('userAdmin.employee.kitchen');
Route::get('/userAdmin/employee/product',[UserAdminEmployeeController::class, 'employeeProduct'])->name('userAdmin.employee.product');
Route::get('/userAdmin/employee/order',[UserAdminEmployeeController::class, 'employeeOrder'])->name('userAdmin.employee.order');


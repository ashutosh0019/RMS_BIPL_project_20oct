<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserAdminController;

Route::get('/',[SuperAdminController::class, 'index'])->name('index');

// Route::get('/index',[SuperAdminController::class, 'index'])->name('index');

Route::post('/index/signup',[SuperAdminController::class, 'index_signup'])->name('index.signup');

Route::post('/superAdmin/save',[SuperAdminController::class, 'save'])->name('superAdmin.save');
Route::post('/superAdmin/check',[SuperAdminController::class, 'check'])->name('superAdmin.check');
Route::get('/superAdmin/logout',[SuperAdminController::class, 'logout'])->name('superAdmin.logout');
Route::get('/changeStatus', [SuperAdminController::class, 'ChangeUserStatus'])->name('changeStatus');


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

Route::group(['middleware'=>['UserAdminAuthCheck']], function(){

    Route::get('/userAdmin/login',[UserAdminController::class, 'UserAdminlogin'])->name('userAdmin.login');

    Route::get('/userAdmin/index',[UserAdminController::class, 'UserAdminIndex'])->name('userAdmin.index');


});
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [AuthController::class,'login']);
Route::post('/login', [AuthController::class,'AuthLogin']);
Route::get('/logout', [AuthController::class,'AuthLogout']);



Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});

// all admin middleware route
Route::group(['middleware' => 'admin'], function (){
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });
});
// all teacher middleware route
Route::group(['middleware' => 'teacher'], function (){
    Route::get('teacher/dashboard', function () {
        return view('admin.dashboard');
    });
});
// all student middleware route
Route::group(['middleware' => 'student'], function (){
    Route::get('student/dashboard', function () {
        return view('admin.dashboard');
    });
});

// all parents middleware route
Route::group(['middleware' => 'parent'], function (){
    Route::get('parent/dashboard', function () {
        return view('admin.dashboard');
    });
});

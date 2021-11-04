<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminController2;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\testcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('test', [testcontroller::class, 'test'])->name('test');
Route::view('page', 'pages/admin/incharge');

Route::view('/','welcome')->name('welcome')->middleware('login');
Route::get('login', [LoginController::class, 'login'])->name('login');


Route::get('logout', function () {
    Auth::logout();
    session()->invalidate();
    return redirect('/');
})->name('logout');

Route::group(['middleware'=>'auth'],function(){
// ADMIN------------------------------------------------------------------------------
        Route::group(['middleware'=>'rank:admin','prefix'=>'admin','as'=>'admin.'],function(){
        // index
        Route::view('incharge','pages/admin/incharge')->name('incharge');
        Route::view('class', 'pages/admin/class')->name('class');
            Route::view('studentlist', 'pages/admin/student_management')->name('studentlist');
            Route::view('adviserlist', 'pages/admin/adviser')->name('adviserlist');
            Route::view('signatorylist', 'pages/admin/signatory')->name('signatorylist');
            Route::view('schoolyearlist', 'pages/admin/schoolyear')->name('schoolyear');
            Route::get('clearancelist', [AdminController2::class, 'clearanceindex'])->name('clearance');

        //  Store DATa
            Route::post('storeIC',[AdminController2::class,'storeIC'])->name('storeIC');
            Route::post('addadviser',[AdminController2::class,'storeAdviser'])->name('storeadviser');
            Route::post('storeclass',[AdminController2::class,'storeClass'])->name('storeclass');
            Route::post('storesignatory',[AdminController2::class,'storeSignatory'])->name('storesignatory');
            Route::post('storestudent',[AdminController2::class,'storeStudent'])->name('storeStudent');
            Route::post('addschoolyear',[AdminController2::class,'storeSchoolyear'])->name('storeSY');
            Route::post('addclearance',[AdminController2::class,'storeClearance'])->name('storeclearance');
            
        // retrieve user
            Route::get('getincharce', [AdminController2::class, 'getincharge'])->name('getincharge');
            Route::get('teacher',[AdminController2::class,'teacher'])->name('teacher');
            Route::get('getclass', [AdminController2::class, 'getClass'])->name('getclass');
            Route::get('headincharge',[AdminController2::class,'incharge'])->name('headincharge');
            Route::get('getstudents', [AdminController2::class, 'getStudents'])->name('getstudents');
            Route::get('classes', [AdminController2::class, 'classes'])->name('classes');
            Route::get('getSY', [AdminController2::class, 'getSY'])->name('getSY');
            Route::get('getadvisers', [AdminController2::class, 'getAdvisers'])->name('getadvisers');
            Route::get('getsignatorys', [AdminController2::class, 'getSignatorys'])->name('getsignatorys');
            Route::get('getclearance', [AdminController2::class, 'getclearance'])->name('getclearance');
            Route::get('assignatory',[AdminController2::class,'assignatory'])->name('assignatory');


            Route::get('getuser/{id}', [AdminController2::class, 'getuser'])->name('getuser');
            Route::get('showassignatory/{id}', [AdminController2::class, 'showassignatory'])->name('showassignatory');
        //UPDATE
            Route::post('updateuser/{id}', [AdminController2::class, 'updateuser'])->name('updateuser');
            Route::get('SYactive/{id}', [AdminController2::class, 'SYactive'])->name('SYactive');
            Route::get('Clearanceactive/{id}', [AdminController2::class, 'Clearanceactive'])->name('Clearanceactive');

        });

// STAFF------------------------------------------------------------------------------
        Route::group(['middleware'=>'rank:staff','prefix'=>'staff','as'=>'staff.'],function(){
            Route::view('clearance','pages/staff/employee_home')->name('clearance');
            Route::view('studentlist','pages/staff/mystudent')->name('mystudent')->middleware('adviser');
        // retrieve
            Route::get('student/{id}', [StaffController::class, 'student'])->name('student');

            Route::get('getclearance', [StaffController::class, 'getclearance'])->name('getclearance');
            Route::get('remark/{id}', [StaffController::class, 'remark'])->name('remark');

            Route::get('view/{id}', [StaffController::class, 'viewclearance'])->name('ciew');
        //UPDATE
            Route::get('updatestatus/{id}', [StaffController::class, 'updatestatus'])->name('updatestatus');
            Route::get('select', [StaffController::class, 'select'])->name('select');
            Route::post('addremark/{id}', [StaffController::class, 'addremark'])->name('addremark');

            Route::get('getmystudent', [StaffController::class, 'getmystudent'])->name('getmystudent');
            
        });
        
// STUDENT------------------------------------------------------------------------------
        Route::group(['middleware'=>'rank:student','prefix'=>'student','as'=>'student.'],function(){
            Route::view('myclearance','pages/student/myclearance')->name('myclearance');
            Route::get('getmyclearance', [StudentController::class, 'getclearance'])->name('getmyclearance');
            Route::get('requirement', [StudentController::class, 'requirements'])->name('requirement');

        });
});

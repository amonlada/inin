<?php

use Illuminate\Support\Facades\Route;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/subject', [App\Http\Controllers\HomeController::class, 'subject'])->name('subject');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

//subject
Route::get('/subject', [App\Http\Controllers\SubjectController::class, 'index'])->name('subject');
Route::post('/addsubject', [App\Http\Controllers\SubjectController::class, 'store']); // เพิ่ม
Route::post('/editsubject', [App\Http\Controllers\SubjectController::class, 'update']); // แก้ไข
Route::get('/deletesubject/{id}', [App\Http\Controllers\SubjectController::class, 'destroy']); // ลบ
//activity

Route::get('/activity', [App\Http\Controllers\ActivityController::class, 'index'])->name('activity');
Route::post('/addactivity', [App\Http\Controllers\ActivityController::class, 'store']); // เพิ่ม
Route::post('/editactivity', [App\Http\Controllers\ActivityController::class, 'update']); // แก้ไข
Route::get('/deleteactivity/{id}', [App\Http\Controllers\ActivityController::class, 'destroy']); // ลบ
//คณะ
Route::get('/faculty', [App\Http\Controllers\FacultyController::class, 'index'])->name('faculty');
Route::post('/addfaculty', [App\Http\Controllers\FacultyController::class, 'store']); // เพิ่ม
Route::post('/editfaculty', [App\Http\Controllers\FacultyController::class, 'update']); // แก้ไข
Route::get('/deletefaculty/{id}', [App\Http\Controllers\FacultyController::class, 'destroy']); // ลบ
//อาจารย์
Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'index'])->name('teacher');
Route::post('/addteacher', [App\Http\Controllers\TeacherController::class, 'store']); // เพิ่ม
Route::get('/deleteteacher/{id}', [App\Http\Controllers\TeacherController::class, 'destroy']); // ลบ
Route::post('/editteacher', [App\Http\Controllers\TeacherController::class, 'update']); // แก้ไข
Route::post('imageUploadPost', [ TeacherController::class, 'imageUploadPost' ])->name('image.upload.post');
//branch
Route::get('/branch', [App\Http\Controllers\BranchController::class, 'index'])->name('branch');
Route::post('/addbranch', [App\Http\Controllers\BranchController::class, 'store']); // เพิ่ม
Route::post('/editbranch', [App\Http\Controllers\BranchController::class, 'update']); // แก้ไข
Route::get('/deletebranch/{id}', [App\Http\Controllers\BranchController::class, 'destroy']); // ลบ

//major
Route::get('/major', [App\Http\Controllers\MajorController::class, 'index'])->name('major');
Route::post('/addmajor', [App\Http\Controllers\MajorController::class, 'store']); // เพิ่ม
Route::post('/editmajor', [App\Http\Controllers\MajorController::class, 'update']); // แก้ไข
Route::get('/deletemajor/{id}', [App\Http\Controllers\MajorController::class, 'destroy']); // ลบ
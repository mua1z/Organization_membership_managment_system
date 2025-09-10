<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\organAdminController;
use App\Http\Controllers\PlanController;



use App\Http\Controllers\Auth\GoogleController;







/**Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class, 'about'])->name('guest.about');
Route::get('/service', [HomeController::class, 'service'])->name('guest.service');
Route::get('/events', [HomeController::class, 'event'])->name('guest.events');
Route::get('/blogs', [HomeController::class, 'blog'])->name('guest.blogs');
Route::get('/contact', [HomeController::class, 'contact'])->name('guest.contact');






Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);




Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/organ', [AdminController::class, 'organ']);
Route::get('/orgAdmin', [AdminController::class, 'orgAdmin']);
Route::post('/orgadmin_upload', [AdminController::class, 'orgadmin_upload']);
Route::get('/members', [AdminController::class, 'members']);
Route::get('/organadmin', [AdminController::class, 'organadmin']);
Route::get('/payments', [AdminController::class, 'payments']);

Route::get('/addorgan', [AdminController::class, 'muaz']);
Route::post('/uploadorgan', [AdminController::class, 'uploadorgan']);
Route::get('/editorgan/{id}', [AdminController::class, 'editorgan']);
Route::post('/updateorgan/{id}', [AdminController::class, 'updateorgan']);
Route::get('/deleteorgan/{id}', [AdminController::class, 'deleteorgan']);

Route::get('/editmembers/{id}', [AdminController::class, 'editmembers']);
Route::post('/updatemember/{id}', [AdminController::class, 'updatemember']);
Route::get('/deletemembers/{id}', [AdminController::class, 'deletemembers']);



Route::get('/member', [organAdminController::class, 'member']);
Route::get('/event', [organAdminController::class, 'event']);
Route::get('/blog', [organAdminController::class, 'blog']);
Route::get('/payment', [organAdminController::class, 'payment']);
 Route::get('organAdmin/plans/upgrade', [PlanController::class, 'ShowUpgradePlan'])->name('organAdmin.plans.upgrade');
 Route::post('organAdmin/plans/upgrade', [PlanController::class, 'UpgradePlan'])->name('organAdmin.plans.upgrade');

Route::get('/sidebar nav', [organAdminController::class, 'sidebar']);
Route::get('/edit_profile/{id}', [organAdminController::class, 'editprofile']);
Route::post('/updateprofile/{id}', [organAdminController::class, 'updateprofile']);


Route::get('/addmember', [organAdminController::class, 'addmember']);
Route::post('/upload_member', [organAdminController::class, 'upload']);
Route::get('/edit/{id}', [organAdminController::class, 'edit']);
Route::post('/editmember/{id}', [organAdminController::class, 'editmember']);
Route::get('/deletemember/{id}', [organAdminController::class, 'deletemember']);


Route::post('/uploadevent', [organAdminController::class, 'uploadevent']);
Route::get('/editevent/{id}', [organAdminController::class, 'editevent']);
Route::post('/updateevent/{id}', [organAdminController::class, 'updateevent']);
Route::get('/deleteevent/{id}', [organAdminController::class, 'deleteevent']);

Route::post('/uploadblog', [organAdminController::class, 'uploadblog']);
Route::get('/editblog/{id}', [organAdminController::class, 'editblog']);
Route::post('/updateblog/{id}', [organAdminController::class, 'updateblog']);
Route::get('/deleteblog/{id}', [organAdminController::class, 'deleteblog']);

Route::post('/uploadpayment', [organAdminController::class, 'uploadpayment']);







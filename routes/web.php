<?php

use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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

Route::get('/', [PostController::class, 'index'])->name('post.index');

Route::get('/search', [JobController::class, 'index'])->name('job.index');


//Job seeker
Route::get('job-seeker/login', [LoginController::class, 'showJobSeekerLoginForm'])->name('jobseeker.login');
Route::post('job-seeker/login', [LoginController::class, 'jobSeekerLogin'])->name('jobseeker.loginNow');
Route::get('job-seeker/registration', [RegisterController::class,'showJobSeekerRegisterForm'])->name('jobseeker.registration');
Route::post('job-seeker/registration', [RegisterController::class,'createJobSeeker'])->name('jobseeker.register');

Route::get('job-seeker/overview', [JobSeekerController::class,'index'])->name('jobseeker.overview');
Route::get('job-seeker/cv', [JobSeekerController::class,'showCV'])->name('jobseeker.cv');
Route::get('job-seeker/password', [JobSeekerController::class,'changePasswordView'])->name('jobseeker.change.password');
Route::put('job-seeker/password', [JobSeekerController::class,'changePassword'])->name('jobseeker.change.password');
Route::get('job-seeker/saved-jobs', [JobSeekerController::class,'showCV'])->name('jobseeker.saved-job');
Route::get('job-seeker/deativate', [JobSeekerController::class,'deactive'])->name('jobseeker.deativate');
Route::delete('job-seeker/delete', [JobSeekerController::class,'deleteAccount'])->name('jobseeker.account.delete');
// Route::get('job-seeker/logout', [JobSeekerController::class,'index'])->name('jobseeker.logout');



Route::get('logout/{guard}', function ($guard) {
        
        if($guard == 'jobseeker'){
                Auth::guard('jobseeker')-> logout();
                return redirect()->route('post.index');
        }
});


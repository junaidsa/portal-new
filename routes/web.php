<?php



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

// Route::get('/', function () {
//     return view('auth.login');
// });

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/teacher/create/{uuid}', [AdminController::class, 'teacherCreate']);
Route::get('/student/create', [AdminController::class, 'studentRegister']);
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
});
Route::get('/home', function () {
    return view('dashboad');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'isSuperAdmin'])->group(function () {

// });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/register', [AdminController::class, 'register']);
    Route::post('/admin/update', [AdminController::class, 'update']);
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit']);
    //********** Branch Start **********//
    Route::get('/branch', [SuperAdminController::class, 'branch']);
    Route::get('/branch/create', [SuperAdminController::class, 'branchCreate']);
    Route::post('/branch/store', [SuperAdminController::class, 'branchStore']);
    Route::post('/branch/update', [SuperAdminController::class, 'branchUpdate']);
    Route::get('/branch/edit/{id}', [SuperAdminController::class, 'branchEdit']);
    Route::get('/branch/delete/{id}', [SuperAdminController::class, 'branchDelete']);
    Route::post('/teacher/store', [AdminController::class, 'teacherStore']);
    Route::get('/teacher', [AdminController::class, 'teacher']);
    Route::get('/subject', [SuperAdminController::class, 'subjects']);
    Route::get('/subject/create', [SuperAdminController::class, 'subjectCreate']);
    Route::post('/subject/store', [SuperAdminController::class, 'subjectStore']);
    Route::post('/subject/update', [SuperAdminController::class, 'subjectUpdate']);
    Route::get('/subject/edit/{id}', [SuperAdminController::class, 'subjectEdit']);
    Route::get('/subject/delete/{id}', [SuperAdminController::class, 'subjectDelete']);
    Route::get('/admin/delete/{id}', [AdminController::class, 'adminDelete']);
    //********** Subject The End **********//

    //********** Tuter Start **********//
    Route::get('/tuitions', [AdminController::class, 'tuitionShow']);
    Route::get('/tuition/create', [AdminController::class, 'tuitionCreate']);
    Route::post('/tuition/store', [AdminController::class, 'tuitionStore']);
    Route::get('/tuition/edit/{id}', [AdminController::class, 'tuitionEdit']);
    Route::post('/tuition/update', [AdminController::class, 'tuitionUpdate']);

        // Main Registertion
        Route::post('/admin/store', [AdminController::class, 'adminStore']);
    Route::get('/tuition/delete/{id}', [AdminController::class, 'tuitionDelete']);


   //********** Staff Start **********/
   Route::get('/staffs', [StaffController::class, 'index']);
   Route::get('/staff/create', [StaffController::class, 'create']);
   Route::post('/staff/store', [StaffController::class, 'store']);
   Route::get('/staff/edit/{id}', [StaffController::class, 'edit']);
   Route::post('/staff/update', [StaffController::class, 'update']);
   Route::get('/staff/delete/{id}', [StaffController::class, 'delete']);




    //********** Category The End **********//
});
require __DIR__.'/auth.php';

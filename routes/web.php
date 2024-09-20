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
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return view('auth.login');
});
Route::get('/home', function () {
    return view('dashboad');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'isSuperAdmin'])->group(function () {
    Route::get('/admin/register', [AdminController::class, 'register']);
    Route::get('/admin', [AdminController::class, 'index']);
    //********** Branch Start **********// 
    Route::get('/branch', [SuperAdminController::class, 'branch']);
    Route::get('/branch/create', [SuperAdminController::class, 'branchCreate']);
    Route::post('/branch/store', [SuperAdminController::class, 'branchStore']);
    Route::post('/branch/update', [SuperAdminController::class, 'branchUpdate']);
    Route::get('/branch/edit/{id}', [SuperAdminController::class, 'branchEdit']);
    Route::get('/branch/delete/{id}', [SuperAdminController::class, 'branchDelete']);
    //********** Branch The End **********//
       Route::get('/teacher/create', [AdminController::class, 'teachercreate']);
    //********** Subject Start **********//
    Route::get('/subject', [SuperAdminController::class, 'subjects']);
    Route::get('/subject/create', [SuperAdminController::class, 'subjectCreate']);
    Route::post('/subject/store', [SuperAdminController::class, 'subjectStore']);
    Route::post('/subject/update', [SuperAdminController::class, 'subjectUpdate']);
    Route::get('/subject/edit/{id}', [SuperAdminController::class, 'subjectEdit']);
    Route::get('/subject/delete/{id}', [SuperAdminController::class, 'subjectDelete']);
    //********** Subject The End **********//
   //********** Category Start **********//
    Route::get('/category', [SuperAdminController::class, 'category']);
    Route::get('/category/create', [SuperAdminController::class, 'categoryCreate']);
    Route::post('/category/store', [SuperAdminController::class, 'categoryStore']);
    Route::post('/category/update', [SuperAdminController::class, 'categoryUpdate']);
    Route::get('/category/edit/{id}', [SuperAdminController::class, 'categoryEdit']);
    Route::get('/category/delete/{id}', [SuperAdminController::class, 'categoryDelete']);
    //********** Category The End **********//
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

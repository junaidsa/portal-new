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
use App\Http\Controllers\ChatController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Utilitycontroller;
use App\Models\Shortcuts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile.edit');

Route::get('/library', [LibraryController::class, 'index'])->name('library.index');

Route::get('/teacher/create/{uuid?}', [AdminController::class, 'teacherCreate']);
Route::get('/teacher/edit/{id}', [AdminController::class, 'teacherEdit']);
Route::get('/students', [StudentController::class, 'index']);
Route::post('/students/s2', [StudentController::class, 'step2']);
Route::post('/students/bank', [StudentController::class, 'bankBase']);
Route::post('/getSubject', [StudentController::class, 'getSubject'])->name('get.subjects');
Route::post('/create/intent', [StudentController::class, 'createPaymentIntent'])->name('intent.create');
Route::post('/payment/confirm', [StudentController::class, 'confirmPayment'])->name('payment.confirm');
Route::post('/payment/prove', [StudentController::class, 'updatePayment'])->name('update.pover');
#######################################################################
//                                          End Library Book
###################################### //  #############################
Route::get('/students/step-1', [StudentController::class, 'create'])->name('form.step1');
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
Route::get('/student/login/{user}', [StudentController::class, 'loginWithToken'])->name('student.login');
Route::get('/students/step-2', [StudentController::class, 'create'])->name('form.step2');
Route::get('/students/step-3', [StudentController::class, 'create'])->name('form.step3');
Route::get('/students/step-4', [StudentController::class, 'create'])->name('form.step4');
Route::get('/students/verify', [StudentController::class, 'create'])->name('form.verify');
Route::post('/students/step1', [StudentController::class, 'postStep1']);
//********** Category The End **********//
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
});
Route::middleware('auth')->group(function () {
    //    *****************************  Spourt Tick *****************************************
    Route::get('/supports', [SupportController::class, 'index'])->name('support.index');
    Route::get('/support/details/{id}', [SupportController::class, 'details'])->name('support.details');
    Route::get('/support/create', [SupportController::class, 'create'])->name('support.create');
    Route::post('/support/store', [SupportController::class, 'store'])->name('support.store');
    Route::post('/support/status/{id}', [SupportController::class, 'updateStatus'])->name('support.status');
    //    *****************************  Suport *****************************************
    Route::get('/student/search', [StudentController::class, 'search'])->name('student.search');
    Route::get('/student/classes', [StudentController::class, 'studentClass']);
    Route::post('/teacher/assign', [StudentController::class, 'assignClasses']);
    Route::post('/classes/link', [StudentController::class, 'updateMaillink']);
    Route::get('/library/details/{id}', [LibraryController::class, 'details'])->name('library.details');
    Route::post('/student/base', [StudentController::class, 'studentBase'])->name('student.base');
    Route::get('/home', [Utilitycontroller::class, 'dashoard'])->name('dashboard');
    Route::get('/shortcut', [Utilitycontroller::class, 'shortcut']);
    Route::get('/shortcut/create', [Utilitycontroller::class, 'shortcutCreate']);
    Route::post('/shortcut/store', [Utilitycontroller::class, 'shortcutStore']);
    Route::get('/shortcut/delete/{id}', [Utilitycontroller::class, 'shortcutDelete']);
    Route::get('/profile/check-password/{id}', [ProfileController::class, 'index']);
    Route::post('/profile/update-image', [ProfileController::class, 'updateProfilepic']);
    Route::post('/profile/check-password', [ProfileController::class, 'checkPassword']);
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword']);
    Route::post('/profile/update', [ProfileController::class, 'update']);
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/register', [AdminController::class, 'register']);
    Route::post('/admin/update', [AdminController::class, 'update']);
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::get('/profile/update-about/{id}', [ProfileController::class, 'index']);
    Route::get('/assign/classes', [TeacherController::class, 'assignClasses']);
    //********** Branch Start **********//
    Route::get('/branch', [SuperAdminController::class, 'branch']);
    Route::get('/branch/create', [SuperAdminController::class, 'branchCreate']);
    Route::post('/branch/store', [SuperAdminController::class, 'branchStore']);
    Route::post('/branch/update', [SuperAdminController::class, 'branchUpdate']);
    Route::get('/branch/edit/{id}', [SuperAdminController::class, 'branchEdit']);
    Route::get('/branch/delete/{id}', [SuperAdminController::class, 'branchDelete']);
    Route::post('/teacher/store', [AdminController::class, 'teacherStore']);
    Route::put('/teacher/{id}', [AdminController::class, 'teacherUpdate'])->name('teacher.update');
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
    Route::get('/chat/messages/{id}', [ChatController::class, 'getMessages'])->name('chat.messages');
    //********** Staff Start **********/
    Route::get('/staffs', [StaffController::class, 'index']);
    Route::get('/staff/create', [StaffController::class, 'create']);
    Route::post('/staff/store', [StaffController::class, 'store']);
    Route::get('/staff/edit/{id}', [StaffController::class, 'edit']);
    Route::post('/staff/update', [StaffController::class, 'update']);
    Route::get('/staff/delete/{id}', [StaffController::class, 'delete']);
    //********** Level Start **********/
    Route::get('/level', [SuperAdminController::class, 'level']);
    Route::get('/level/create', [SuperAdminController::class, 'levelCreate']);
    Route::post('/level/store', [SuperAdminController::class, 'levelStore']);
    Route::get('/level/edit/{id}', [SuperAdminController::class, 'levelEdit']);
    Route::post('/level/update', [SuperAdminController::class, 'levelUpdate']);
    Route::get('/level/delete/{id}', [SuperAdminController::class, 'levelDelete']);
    Route::post('/level/base', [StudentController::class, 'levelBase']);
    Route::post('/create/schedule', [StudentController::class, 'storeSchedule']);
    // ********** Enquiry Start ***********/
    Route::get('enquiry', [EnquiryController::class, 'index'])->name('enquiry.index');
    Route::get('enquiry/create', [EnquiryController::class, 'create'])->name('enquiry.create');
    Route::post('enquiry/store', [EnquiryController::class, 'enquiryStore'])->name('enquiry.store');
    Route::get('enquiry/edit/{id}', [EnquiryController::class, 'enquiryEdit'])->name('enquiry.edit');
    Route::post('enquiry/update', [EnquiryController::class, 'enquiryUpdate'])->name('enquiry.update');
    Route::get('enquiry/delete/{id}', [EnquiryController::class, 'enquiryDelete'])->name('enquiry.delete');



    #######################################################################
    //                                          Library Book
    ###################################### //  #############################
    Route::get('/place/order/{id}', [LibraryController::class, 'place_order'])->name('place.order');
    Route::get('/categories', [LibraryController::class, 'indexCategory']);
    Route::get('/categories/edit/{id}', [LibraryController::class, 'editCategory']);
    Route::get('/category/create', [LibraryController::class, 'createCategory']);
    Route::put('/category/update/{id}', [LibraryController::class, 'updateCategory'])->name('category.update');
    Route::post('/category/store', [LibraryController::class, 'storyCategory']);
    Route::get('/category/delete/{id}', [LibraryController::class, 'deleteCategory']);


    Route::get('/order', [LibraryController::class, 'order'])->name('order.index');
    Route::get('/order/pdf', [LibraryController::class, 'generatePdf'])->name('orders.pdf');

    Route::get('/order/my', [LibraryController::class, 'myOrder'])->name('order.my');
    Route::put('/order/update-status/{id}', [LibraryController::class, 'updateStatus'])->name('status.update');
    Route::get('/orders/pdf', [LibraryController::class, 'generatePdf'])->name('orders.pdf');
    Route::get('/chat/{id?}', [ChatController::class, 'chat'])->name('chat.index');
    Route::post('/mark-as-read', [ChatController::class, 'markAsRead']);
    Route::get('/contacts', [ChatController::class, 'getContacts'])->middleware('auth')->name('contact.chat');
    Route::post('/message', [ChatController::class, 'store'])->name('message.store');
    Route::get('/email', [ChatController::class, 'email']);


    #######################################################################
    //                                          End Library Book
    ###################################### //  #############################
    //********** Category The End **********//
    Route::get('/student', [AdminController::class, 'student']);

    Route::resource('products', \App\Http\Controllers\ProductController::class);

    Route::controller(StripePaymentController::class)->group(function () {
        Route::get('/stripe/checkout', [StripePaymentController::class, 'stripeCheckout'])->name('stripe.checkout');
        Route::get('/stripe/checkout/success', [StripePaymentController::class, 'stripeCheckoutSuccess'])->name('stripe.checkout.success');
    });
});
require __DIR__ . '/auth.php';

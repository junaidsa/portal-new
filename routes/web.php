<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReminderController;
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
Route::get('/send-reminders', [ReminderController::class, 'sendReminders']);
Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile.edit');
Route::get('/library', [LibraryController::class, 'index'])->name('library.index');
Route::get('/teacher/create/{uuid?}', [TeacherController::class, 'teacherCreate'])->name('teacher.create');
Route::post('/level/base', [StudentController::class, 'levelBase']);
Route::post('/create/schedule', [StudentController::class, 'storeSchedule']);
Route::post('/staff/store', [StaffController::class, 'store']);
Route::get('/teacher/edit/{id}', [AdminController::class, 'teacherEdit']);
Route::get('/teacher/delete/{id}', [TeacherController::class, 'teacherDelete']);
Route::post('/students/s2', [StudentController::class, 'step2']);
Route::post('/students/bank', [StudentController::class, 'bankBase']);
Route::post('/getSubject', [StudentController::class, 'getSubject'])->name('get.subjects');
Route::post('/create/intent', [StudentController::class, 'createPaymentIntent'])->name('intent.create');
Route::post('/payment/confirm', [StudentController::class, 'confirmPayment'])->name('payment.confirm');
Route::post('/payment/prove', [StudentController::class, 'updatePayment'])->name('update.pover');
Route::get('/students/step-1', [StudentController::class, 'create'])->name('form.step1');
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
Route::post('/schedule/report', [StudentController::class, 'studentReportList'])->name('schedule.report');
Route::get('/student/login/{user}', [StudentController::class, 'loginWithToken'])->name('student.login');
Route::get('/students/step-2', [StudentController::class, 'create'])->name('form.step2');
Route::get('/students/step-3', [StudentController::class, 'create'])->name('form.step3');
Route::get('/students/step-4', [StudentController::class, 'create'])->name('form.step4');
Route::get('/get-levels', [Utilitycontroller::class, 'getLevelsByBranch'])->name('get-levels');
Route::get('/students/verify', [StudentController::class, 'create'])->name('form.verify');
Route::post('/students/step1', [StudentController::class, 'postStep1']);
Route::get('/forgot/password', [AdminController::class, 'forgotpassword'])->name('forgot.password');
Route::post('/process-forgot-password', [AdminController::class, 'processForgotPassword'])->name('processForgot.Password');
Route::get('/reset/password/{token}', [AdminController::class, 'resetPassword'])->name('reset.password');
Route::post('/process/reset/password', [AdminController::class, 'processResetPassword'])->name('process.reset.password');
Route::post('/teacher/store', [TeacherController::class, 'teacherStore']);
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
})->name('login');
Route::middleware('auth')->group(function () {
    // Notifications Controller
    Route::post('/notification/read', [Utilitycontroller::class, 'markAllNotificationsAsRead'])->name('notification.read');
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/supports', [SupportController::class, 'index'])->name('support.index');
    Route::get('/support/details/{id}', [SupportController::class, 'details'])->name('support.details');
    Route::get('/support/create/{id?}', [SupportController::class, 'create'])->name('support.create');
    Route::post('/support/store', [SupportController::class, 'store'])->name('support.store');
    Route::get('/support/deleted/{id}', [SupportController::class, 'supportDelete'])->name('support.delete');
    Route::post('/support/status/{id}', [SupportController::class, 'updateStatus'])->name('support.status');
    //    *****************************  Suport *****************************************
    Route::get('/student/search', [StudentController::class, 'search'])->name('student.search');
    Route::get('/student/report', [StudentController::class, 'studentReport'])->name('student.report');
    Route::get('/teacher/search', [TeacherController::class, 'search'])->name('teacher.search');
    Route::get('/student/classes', [StudentController::class, 'studentClass'])->name('student.classes');
    Route::get('/class/edit/{id}', [StudentController::class, 'studentEdit']);
    Route::post('/send-reminder/{id}', [ScheduleController::class, 'sendReminder'])->name('renader.send');
    Route::put('class/{id}', [StudentController::class, 'studentUpdate'])->name('schedule.update');
    Route::post('/teacher/assign', [StudentController::class, 'assignClasses']);
    Route::post('/classes/link', [StudentController::class, 'updateMaillink']);
    Route::get('/library/details/{id}', [LibraryController::class, 'details'])->name('library.details');
    Route::post('/student/base', [StudentController::class, 'studentBase'])->name('student.base');
    Route::post('/teacher/base', [TeacherController::class, 'teacherBase'])->name('teacher.base');
    Route::get('/teacher/report', [TeacherController::class, 'teacherReport'])->name('teacher.report');
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
    Route::get('/assign/classes', [TeacherController::class, 'assignClasses'])->name('teacher.classes');
    //********** Branch Start **********//
    Route::get('/branch', [SuperAdminController::class, 'branch']);
    Route::get('/notifications', [Utilitycontroller::class, 'fetchNotifications']);
    Route::get('/notification/list', [Utilitycontroller::class, 'notificationList']);
    Route::post('/notification/mark-as-read', [Utilitycontroller::class, 'markAsRead']);
    Route::get('/branch/create', [SuperAdminController::class, 'branchCreate']);
    Route::post('/branch/store', [SuperAdminController::class, 'branchStore']);
    Route::post('/branch/update', [SuperAdminController::class, 'branchUpdate']);
    Route::get('/branch/edit/{id}', [SuperAdminController::class, 'branchEdit']);
    Route::get('/branch/delete/{id}', [SuperAdminController::class, 'branchDelete']);
    Route::get('/branch/details', [SuperAdminController::class, 'branchDetail']);
    Route::put('/teacher/{id}', [AdminController::class, 'homeUpdate'])->name('teacher.update');
    Route::get('/teacher', [AdminController::class, 'teacher']);
    Route::get('/subject', [SuperAdminController::class, 'subjects'])->name('subject.index');
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
    Route::get('/payment', [ScheduleController::class, 'bankPayment'])->name('payment.index');
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
    // web.php
    Route::get('/search', [LibraryController::class, 'search'])->name('search');


    Route::get('bank/create', [SuperAdminController::class, 'bankCreate'])->name('bank.create');
    Route::post('bank/store', [SuperAdminController::class, 'bankStore'])->name('bank.store');

    Route::post('/payment/approve/{id}', [ScheduleController::class, 'paymentStatus'])->name('status.update');

    Route::get('/stripe/payment', [StripePaymentController::class, 'stripePayment'])->name('stripe.payment');

    Route::controller(StripePaymentController::class)->group(function () {
        Route::get('/stripe/checkout', [StripePaymentController::class, 'stripeCheckout'])->name('stripe.checkout');
        Route::get('/stripe/checkout/success', [StripePaymentController::class, 'stripeCheckoutSuccess'])->name('stripe.checkout.success');
        Route::get('/stripe/classes/success', [StripePaymentController::class, 'stripeClassPayment'])->name('stripe.class.payment');
    });
});
require __DIR__ . '/auth.php';

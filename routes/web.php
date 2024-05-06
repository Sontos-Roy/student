<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\AdminStudentControler;
use App\Http\Controllers\Admin\ApproverRoleController;
use App\Http\Controllers\Admin\ClearanceController as AdminClearanceController;
use App\Http\Controllers\Admin\DegreeController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\ProvisionalCertificatesController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\AdminNotificationController;
use App\Http\Controllers\Student\ClearanceController;
use App\Http\Controllers\Student\ProvisionalCertificatesController as StudentProvisionalCertificatesController;
use App\Http\Controllers\Student\StudentAuthController;
use App\Http\Controllers\Student\StudentHomeController;
use App\Http\Controllers\Student\StudentProfileController;
use App\Models\Testimonial;
use App\Notifications\AuthNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [StudentAuthController::class, 'index'])->name('student.index');
Route::post('/student-login', [StudentAuthController::class, 'login'])->name('student.login');
Route::get('/student-register', [StudentAuthController::class, 'register'])->name('student.register');
Route::post('/student-register', [StudentAuthController::class, 'register_store'])->name('student.register.store');
Route::get('/student-validation', [StudentAuthController::class, 'otp'])->name('student.otp');
Route::get('/forget-password', [StudentAuthController::class, 'forget_password'])->name('student.forget.password');
Route::get('/forget-password-otp', [StudentAuthController::class, 'forget_password_otp'])->name('student.forget.password.otp');
Route::post('/forget-password-otp', [StudentAuthController::class, 'forget_password_otp_store'])->name('student.forget.password.otp.store');
Route::post('/forget-password', [StudentAuthController::class, 'forget_password_store'])->name('student.forget.password.store');
Route::post('/student-otp-verify', [StudentAuthController::class, 'otp_store'])->name('student.otp.verify');
Route::get('/student-otp-resent', [StudentAuthController::class, 'resend'])->name('student.otp.resend');
Route::get('/two-factor', [StudentAuthController::class, 'two_factor_login'])->name('student.two.factor.login');
Route::post('/two-factor', [StudentAuthController::class, 'two_factor_login_store'])->name('student.two.factor.login.store');
Route::get('student-logout', [StudentAuthController::class, 'logout'])->name('student.logout');

Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login_store'])->name('admin.login.store');
Route::get('admin-signup', [AdminAuthController::class, 'signup'])->name('admin.signup');
Route::post('admin-signup', [AdminAuthController::class, 'signup_store'])->name('admin.signup.store');
Route::get('admin-logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('notification', function(){
    if (auth()->guard('admin')->check()) {
        FacadesNotification::send(auth()->guard('admin')->user(), new AuthNotification());
    } else {
        dd('not');
    }
});
Route::group(['middleware' => 'auth', 'as' => 'students.', 'prefix' => 'students'], function(){
    Route::get('/set_password', [StudentAuthController::class, 'password'])->name('password');
    Route::post('/set_password', [StudentAuthController::class, 'password_store'])->name('password.store');
    Route::get('overview', [StudentHomeController::class, 'index'])->name('dashboard');
    Route::get('notifications', [StudentHomeController::class, 'notifications'])->name('notifications');
    Route::delete('notifications/destroy/{id}', [StudentHomeController::class, 'notifications_destroy'])->name('notifications.destroy');
    Route::get('profile', [StudentProfileController::class, 'Profile'])->name('profile');
    Route::get('profile/edit', [StudentProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/edit', [StudentProfileController::class, 'edit_store'])->name('profile.edit.store');
    Route::get('profile/settings', [StudentProfileController::class, 'settings'])->name('profile.settings');
    Route::get('profile/security', [StudentProfileController::class, 'security'])->name('profile.security');
    Route::get('profile/statements', [StudentProfileController::class, 'statements'])->name('profile.statements');
    Route::post('change_phone', [StudentProfileController::class, 'change_phone'])->name('change.phone');
    Route::post('change_password', [StudentProfileController::class, 'change_password'])->name('change.password');
    Route::get('get_otp', [StudentProfileController::class, 'getOtp'])->name('getOtp.two.factor');
    Route::post('enable_otp', [StudentProfileController::class, 'enable_otp'])->name('enable.two.factor');
    Route::delete('deactive_user/{id}', [StudentProfileController::class, 'deactive_user'])->name('deactive.user');
    Route::get('testimonials', [StudentHomeController::class, 'testimonials'])->name('testimonials.index');
    Route::get('testimonials/create', [StudentHomeController::class, 'testimonialsCreate'])->name('testimonials.create');
    Route::get('testimonials/status/{id}', [StudentHomeController::class, 'testimonialsStatus'])->name('testimonials.status');
    Route::post('testimonials', [StudentHomeController::class, 'testimonialsStore'])->name('testimonials.store');
    Route::get('provisional-certificate-form', [StudentProvisionalCertificatesController::class, 'index'])->name('provisional.certificates.form.index');
    Route::post('provisional/store', [StudentProvisionalCertificatesController::class, 'get_store'])->name('provisional.get.store');
    Route::get('provisional/apply', [StudentProvisionalCertificatesController::class, 'create'])->name('provisional.create');
    Route::post('provisional/application', [StudentProvisionalCertificatesController::class, 'store'])->name('provisional.store');
    Route::get('clearence', [ClearanceController::class, 'index'])->name('clearence.index');
    Route::post('clearence/store', [ClearanceController::class, 'get_store'])->name('clearence.get.store');
    Route::get('clearence/apply', [ClearanceController::class, 'create'])->name('clearence.create');
    Route::post('clearence/application', [ClearanceController::class, 'store'])->name('clearence.store');
    Route::get('clearence/status', [ClearanceController::class, 'status'])->name('clearence.status');
    Route::get('help', [HelpController::class, 'create'])->name('help.create');
    Route::post('help', [HelpController::class, 'store'])->name('help.store');
});

Route::group(['middleware' => 'admin', 'as' => 'admin.', 'prefix'=>'admin'], function(){
    Route::get('dashboard', [AdminAuthController::class, 'index'])->name('dashboard');
    Route::resource('notifications', AdminNotificationController::class);
    Route::resource('students', AdminStudentControler::class);
    Route::get('students/view/{id}', [AdminStudentControler::class, 'viewStudent'])->name('students.view');
    Route::post('student-import', [AdminStudentControler::class, 'userImport'])->name('student.import');
    Route::delete('delete_students', [AdminStudentControler::class, 'deleteStudents'])->name('delete.students');
    Route::delete('delete_users', [AdminsController::class, 'deleteusers'])->name('delete.users');
    Route::resource('manage-users', AdminsController::class, ['names' => 'manage.users']);
    Route::resource('permissions', PermissionsController::class, ['names' => 'permissions']);
    Route::resource('roles', RolesController::class, ['names' => 'roles']);
    Route::resource('settings', SettingController::class, ['names' => 'settings']);
    Route::resource('degree', DegreeController::class, ['names' => 'degree']);
    Route::resource('clearance', AdminClearanceController::class, ['names' => 'clearance']);
    Route::get('get-current-approver/{id}',[AdminClearanceController::class, 'getCurrentApprover'])->name('get.current.clearnace.approver');
    Route::post('get-degree',[AdminClearanceController::class, 'getDegree'])->name('get.degree');
    Route::post('get-clearance-approve/{id}',[AdminClearanceController::class, 'getApprove'])->name('get.clearance.approve');
    Route::get('check-clearance-approve/{id}',[AdminClearanceController::class, 'checkApprove'])->name('check.clearance.approve');
    Route::resource('approver-role', ApproverRoleController::class, ['names' => 'approver.roles']);
    Route::resource('payments', PaymentController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('provisional_certificates', ProvisionalCertificatesController::class, ['names' => 'provisional.certificates']);
    Route::post('pr_supervisor_assign', [ProvisionalCertificatesController::class, 'assign_super_visor'])->name('provisional.assign.supervisor');
    Route::post('pr_assign_chairman', [ProvisionalCertificatesController::class, 'assign_chairman'])->name('provisional.assign.chairman');
    Route::post('pr_assign_dean', [ProvisionalCertificatesController::class, 'assign_dean'])->name('provisional.assign.dean');
    Route::post('pr_supervisor_approve', [ProvisionalCertificatesController::class, 'approve_super_visor'])->name('provisional.approve.supervisor');
    Route::post('pr_chairman_approve', [ProvisionalCertificatesController::class, 'approve_chairman'])->name('provisional.approve.chairman');
    Route::post('pr_dean_approve', [ProvisionalCertificatesController::class, 'approve_dean'])->name('provisional.approve.dean');
    Route::post('supervisor_assign', [TestimonialController::class, 'assign_super_visor'])->name('assign.supervisor');
    Route::post('assign_chairman', [TestimonialController::class, 'assign_chairman'])->name('assign.chairman');
    Route::post('assign_dean', [TestimonialController::class, 'assign_dean'])->name('assign.dean');
    Route::post('supervisor_approve', [TestimonialController::class, 'approve_super_visor'])->name('approve.supervisor');
    Route::post('chairman_approve', [TestimonialController::class, 'approve_chairman'])->name('approve.chairman');
    Route::post('dean_approve', [TestimonialController::class, 'approve_dean'])->name('approve.dean');
    Route::post('payment_status/{id}', [PaymentController::class, 'status'])->name('change.payment.status');
    Route::post('no-due/{id}', [PaymentController::class, 'noDue'])->name('no.due');
    Route::get('helps', [HelpController::class, 'index'])->name('help.index');
    Route::get('helps/{id}/show', [HelpController::class, 'show'])->name('help.show');
    Route::delete('helps/{id}/delete', [HelpController::class, 'destroy'])->name('help.destroy');
    Route::get('admins-of-rolewish', [AdminClearanceController::class, 'rolewishadmins'])->name('role.wish.admins');
});



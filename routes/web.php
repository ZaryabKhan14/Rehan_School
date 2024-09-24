<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\student\StudentDashboardController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\teacher\TeacherDashboardController;
use App\Http\Controllers\admin\AddUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\ShowUserController;
use App\Http\Controllers\admin\ShowStudentController;
use App\Http\Controllers\admin\StudentINformationController;
use App\Http\Controllers\admin\StudentAttendenceController;
use App\Http\Controllers\teacher\AddStudentController;
use App\Http\Controllers\teacher\DisplayStudentController;
use App\Http\Controllers\teacher\AddStudentAttendenceController;
use App\Http\Controllers\teacher\DisplayStudentAttendenceController;
use App\Http\Controllers\admin\ShowStudentAttendenceController;
use App\Http\Controllers\principle\UserAddController;
use App\Http\Controllers\principle\PrincipleDashboardController;
use App\Http\Controllers\principle\ShowingUserController;
use App\Http\Controllers\principle\ShowingStudentsDataController;
use App\Http\Controllers\principle\ShowingStudentInformationController;
use App\Http\Controllers\principle\AddStudentAttendence;
use App\Http\Controllers\principle\ShowingStudentAttendence;
use App\Http\Controllers\principle\StudentFeeController;
use App\Http\Controllers\principle\ShowStudentFeeController;
use App\Http\Controllers\principle\FeeVoucherController;
use App\Http\Controllers\principle\ShowFeeVoucherController;
use App\Http\Controllers\admin\StudentShowFeeVoucherController;
use App\Http\Controllers\admin\StudentFeeVoucherController;
use App\Http\Controllers\admin\FeeStudentController;
use App\Http\Controllers\admin\ShowingStudentFeeController;
use App\Http\Controllers\student\ShowStudentInformationController;
use App\Http\Controllers\student\ShowsStudentFeeController;
use App\Http\Controllers\student\StripeController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\principle\ShowPaymentController;
use App\Http\Controllers\admin\FeeVoucherStatusController;
use App\Http\Controllers\admin\AddStaffInformationController;
use App\Http\Controllers\admin\ShowStaffInformationController;
use App\Http\Controllers\principle\AddingStaffInformationController;
use App\Http\Controllers\principle\ShowingStaffInformationController;
use App\Http\Controllers\student\FreezeFormController;
use App\Http\Controllers\student\ShowAdmissionFreezeController;
use App\Http\Controllers\admin\ShowingAdmissionFreezeController;
use App\Http\Controllers\principle\AdmissionFreezeDetailsController;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {


Route::middleware(['role:admin'])->group(function () {

Route::get('/admin_dashboard',[AdminDashboardController::class,'admin'])->name('admin');
Route::post('/admin_add_user',[AddUserController::class,'add_user'])->name('add_user');
Route::get('/add_user_form',[AddUserController::class,'add_user_form'])->name('add_user_form');
Route::get('/admin/show_admin_list',[ShowUserController::class,'show_admin'])->name('show_admin');
Route::get('/admin/show_principle_list',[ShowUserController::class,'show_teacher'])->name('show_teacher');
Route::get('/admin/show_teacher_list',[ShowUserController::class,'show_principle'])->name('show_principle');
Route::get('/admin/show_student_list',[ShowUserController::class,'show_student_user'])->name('show_student_user');
Route::get('/admin/delete_user/{id}',[ShowUserController::class,'delete_user'])->name('delete_user');
Route::get('/admin/edit_user/{id}',[ShowUserController::class,'edit_user'])->name('edit_user');
Route::post('/admin/update_user/{id}',[ShowUserController::class,'update_user'])->name('update_user');
Route::get('/admin/show_student',[ShowStudentController::class,'show_students'])->name('show_students');
Route::get('/admin/student_information/{id}',[ShowStudentController::class,'student_information'])->name('student_information');
Route::post('/admin/add_student_information',[ShowStudentController::class,'add_student_information'])->name('add_student_information');
Route::get('/admin/show_student_information',[StudentINformationController::class,'show_student_information'])->name('show_student_information');
Route::get('/admin/student_attendence',[StudentAttendenceController::class,'student_attendences'])->name('student_attendences');
Route::get('/admin/attendance/present/{student_id}', [StudentAttendenceController::class, 'markpresent'])->name('markpresent');
Route::get('/admin/attendance/absent/{student_id}', [StudentAttendenceController::class, 'markabsent'])->name('markabsent');
Route::get('/admin/show_student_attendences', [ShowStudentAttendenceController::class, 'show_student_attendence'])->name('show_student_attendence');
Route::get('/admin/delete_student_information/{id}', [StudentINformationController::class, 'delete_student_information'])->name('delete_student_information');
Route::get('/admin/edit/student/information/{id}', [StudentINformationController::class, 'edit_student_information'])->name('edit_student_information');
Route::post('/admin/update/student/information/{id}', [StudentINformationController::class, 'update_student_information'])->name('update_student_information');
Route::get('admin/generate-studentpdf', [StudentINformationController::class, 'generateStudentinformationPDF'])->name('generateStudentinformationPDF');
Route::get('admin/student/fee', [FeeStudentController::class, 'admin_Student_fee'])->name('admin_Student_fee');
Route::get('admin/student/fee/form/{id}', [FeeStudentController::class, 'add_student_form_admin'])->name('add_student_form_admin');
Route::post('admin/add/student/fee', [FeeStudentController::class, 'add_student_fee_admin'])->name('add_student_fee_admin');
Route::get('admin/show_student_fee', [ShowingStudentFeeController::class, 'show_student_fee_admin'])->name('show_student_fee_admin');

Route::post('admin/generate/voucher', [StudentFeeVoucherController::class, 'Stduent_fee_voucher'])->name('Stduent_fee_voucher');
Route::get('admin/show/voucher', [StudentShowFeeVoucherController::class, 'showing_student_fee_voucher'])->name('showing_student_fee_voucher');
Route::get('admin/voucher/pdf/{student_id}', [StudentShowFeeVoucherController::class, 'fee_voucher_downloadPDF'])->name('generatepdf');
Route::get('admin/payments', [PaymentController::class, 'show_payment'])->name('show_payment');
Route::post('/admin/update-fee-status/{id}', [FeeVoucherStatusController::class, 'updateFeeStatus'])->name('updateFeeStatus');
Route::get('/admin/add_staff_information/{id}', [AddStaffInformationController::class, 'staff_information_form'])->name('staff_information_form');
Route::get('/admin/show_staff', [AddStaffInformationController::class, 'showing_staff'])->name('showing_staff');
Route::post('/admin/inserting_staff_information', [AddStaffInformationController::class, 'add_staff_information'])->name('add_staff_information');
Route::get('/admin/showing_staff_information', [ShowStaffInformationController::class, 'show_staff_information'])->name('show_staff_information');
Route::get('/admin/delete_staff_information/{id}', [ShowStaffInformationController::class, 'delete_staff_information'])->name('delete_staff_information');
Route::get('/admin/edit_staff_information/{id}', [ShowStaffInformationController::class, 'edit_form'])->name('edit_form');
Route::post('/admin/edit_staff_information/{id}', [ShowStaffInformationController::class, 'update_staff_information'])->name('update_staff_information');
Route::get('/admin/admission_freeze_information', [ShowingAdmissionFreezeController::class, 'show_admission_freeze_detail'])->name('show_admission_freeze_detail');
Route::post('/admission-freeze/status/{id}', [ShowingAdmissionFreezeController::class, 'admission_freeze_status'])->name('admission_freeze_status');
});


Route::middleware(['role:teacher'])->group(function () {

    Route::get('/teacher_dashboard',[TeacherDashboardController::class,'teacher'])->name('teacher');

Route::get('teacher/add_student_form',[AddStudentController::class,'student_form'])->name('student_form');
Route::post('teacher/add_student',[AddStudentController::class,'add_student_form'])->name('add_student_form');
Route::get('teacher/show_student',[DisplayStudentController::class,'show_student'])->name('show_student');
Route::get('/teacher/student_attendence',[AddStudentAttendenceController::class,'student_attendence'])->name('student_attendence');
Route::get('/teacher/attendance/present/{student_id}', [AddStudentAttendenceController::class, 'mark_present'])->name('mark_present');
Route::get('/teacher/attendance/absent/{student_id}', [AddStudentAttendenceController::class, 'mark_absent'])->name('mark_absent');
Route::get('/teacher/show_student_attendence', [DisplayStudentAttendenceController::class, 'display_student_attendence'])->name('display_student_attendence');

});

Route::middleware(['role:principle'])->group(function () {

Route::get('/principle_dashboard',[PrincipleDashboardController::class,'principle'])->name('principle');
Route::get('principle/add_user',[UserAddController::class,'principle_adding_user_form'])->name('principle_adding_user_form');
Route::post('principle/user_add',[UserAddController::class,'principle_add_user'])->name('principle_add_user');
Route::get('principle/show_teacher',[ShowingUserController::class,'principle_show_teacher'])->name('principle_show_teacher');
Route::get('principle/show_student',[ShowingUserController::class,'principle_show_student_user'])->name('principle_show_student_user');
Route::get('principle/delete_user/{id}', [ShowingUserController::class, 'principle_delete_user'])->name('principle_delete_user');
Route::get('principle/edit_user/{id}',[ShowingUserController::class,'principle_edit_user'])->name('principle_edit_user');
Route::post('principle/update_user/{id}',[ShowingUserController::class,'principle_update_user'])->name('principle_update_user');
Route::get('principle/show/student',[ShowingStudentsDataController::class,'show_students_data'])->name('show_students_data');
Route::get('principle/add_student_information/{id}',[ShowingStudentsDataController::class,'student_information_add'])->name('student_information_add');
Route::post('/principle/add_student_information',[ShowingStudentsDataController::class,'adding_student_information'])->name('adding_student_information');
Route::get('/principle/showing_student_information',[ShowingStudentInformationController::class,'showing_student_information'])->name('showing_student_information');
Route::get('/principle/delete_information_student/{id}',[ShowingStudentInformationController::class,'student_information_delete'])->name('student_information_delete');
Route::get('/principle/edit_student_information/{id}', [ShowingStudentInformationController::class, 'edit_information_student'])->name('edit_information_student');
Route::post('/principle/update_student_information/{id}', [ShowingStudentInformationController::class, 'update_information_student'])->name('update_information_student');
Route::get('/principle/add_student_attendence', [AddStudentAttendence::class, 'student_attendence_form'])->name('student_attendence_form');
Route::get('/principle/attendance/present/{student_id}', [AddStudentAttendence::class, 'mark_present_student'])->name('mark_present_student');
Route::get('/principle/attendance/absent/{student_id}', [AddStudentAttendence::class, 'mark_absent_student'])->name('mark_absent_student');
Route::get('/principle/displaying_student_attendence', [ShowingStudentAttendence::class, 'displaying_student_attendence'])->name('displaying_student_attendence');
Route::get('principle/generate-student-pdf', [ShowingStudentInformationController::class, 'generateStudentPDF'])->name('generate_student_pdf');
Route::get('principle/student/fee', [StudentFeeController::class, 'Student_fee'])->name('Student_fee');
Route::get('principle/student/fee/form/{id}', [StudentFeeController::class, 'add_student_form'])->name('add_student_form');
Route::post('principle/add/student/fee', [StudentFeeController::class, 'add_student_fee'])->name('add_student_fee');
Route::get('principle/show_student_fee', [ShowStudentFeeController::class, 'show_student_fee'])->name('show_student_fee');
Route::post('principle/generate/voucher', [FeeVoucherController::class, 'fee_voucher'])->name('fee_voucher');
Route::get('principle/show/voucher', [ShowFeeVoucherController::class, 'show_student_fee_voucher'])->name('show_student_fee_voucher');
Route::get('generate/voucher/pdf/{id}', [ShowFeeVoucherController::class, 'downloadPDF'])->name('generate.pdf');
Route::get('principle/payments', [ShowPaymentController::class, 'showing_payments'])->name('showing_payments');
Route::get('/principle/adding_staff_information/{id}', [AddingStaffInformationController::class, 'staffs_information_form'])->name('staffs_information_form');
Route::get('/principle/show_staff', [AddingStaffInformationController::class, 'show_staffs'])->name('show_staffs');
Route::post('/principle/insert_staff_information', [AddingStaffInformationController::class, 'adding_staff_information'])->name('adding_staff_information');
Route::get('/principle/showing_staff_information', [ShowingStaffInformationController::class, 'showing_staff_information'])->name('showing_staff_information');
Route::get('/principle/deleting_staff_information/{id}', [ShowingStaffInformationController::class, 'deleting_staff_information'])->name('deleting_staff_information');
Route::get('/principle/edit_form_staff_information/{id}', [ShowingStaffInformationController::class, 'editing_form'])->name('editing_form');
Route::post('/principle/editing_staff_information/{id}', [ShowingStaffInformationController::class, 'updating_staff_information'])->name('updating_staff_information');
Route::post('/principle/admission-freeze/status/{id}', [AdmissionFreezeDetailsController::class, 'admission_freeze_statuss'])->name('admission_freeze_statuss');
Route::get('/principle/admission_freeze_details', [AdmissionFreezeDetailsController::class, 'showing_admission_freeze_detail'])->name('showing_admission_freeze_detail');
});




Route::middleware(['role:student'])->group(function () {

Route::get('/student_dashboard', [StudentDashboardController::class, 'student'])->name('student_dashboard');
Route::get('/show/student/information',[ShowStudentInformationController::class,'show_student_info'])->name('show_student_info');
Route::get('/show/student/fee',[ShowsStudentFeeController::class,'student_fee'])->name('student_fee');
Route::post('/student/stripe',[StripeController::class,'stripe'])->name('stripe');
Route::post('/stripe',[StripeController::class,'stripePost'])->name('stripePost');
Route::get('/payment-return', [StripeController::class, 'paymentReturn'])->name('paymentReturn');
Route::get('student/freeze_form', [FreezeFormController::class, 'freeze_form'])->name('freeze_form');
Route::post('student/adding/freeze_informaton', [FreezeFormController::class, 'add_freeze_form_details'])->name('add_freeze_form_details');
Route::get('student/show/freeze/details', [ShowAdmissionFreezeController::class, 'show_admission_freeze_details'])->name('show_admission_freeze_details');
});

});
   

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/redirect',[DashboardController::class,'redirect'])->name('redirect');


});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\setup\StudentClassController;
use App\Http\Controllers\Backend\setup\StudentYearController;
use App\Http\Controllers\Backend\setup\StudentGroupController;
use App\Http\Controllers\Backend\setup\StudentShiftController;
use App\Http\Controllers\Backend\setup\FeeCategoryController;
use App\Http\Controllers\Backend\setup\FeeAmountController;
use App\Http\Controllers\Backend\setup\ExamTypeController;
use App\Http\Controllers\Backend\setup\SchoolSubjectController;
use App\Http\Controllers\Backend\setup\AssignSubjectController;
use App\Http\Controllers\Backend\setup\DesignationController;
use App\Http\Controllers\Backend\Student\StudentRegController;




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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');

//user mangement
Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class,'UserView'])->name('user.view');
    Route::get('/add',[UserController::class,'UserAdd'])->name('user.add');
    Route::post('/store',[UserController::class,'Store'])->name('user.store');
    Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('user.edit');
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('user.delete');
});
//user profile
Route::prefix('profile')->group(function(){
    Route::get('/view',[ProfileController::class,'ProfileView'])->name('profile.view');
    Route::get('/edit',[ProfileController::class,'ProfileEdit'])->name('profile.edit');
    Route::post('/store',[ProfileController::class,'ProfileStore'])->name('profile.store');
    Route::get('/password/view',[ProfileController::class,'PasswordView'])->name('password.view');
    Route::post('/password/update',[ProfileController::class,'PasswordUpdate'])->name('password.update');
});
//student class setup
Route::prefix('setup')->group(function(){
    Route::get('/student/class/view',[StudentClassController::class,'ViewStudent'])->name('student.class.view');
    Route::get('/student/class/add',[StudentClassController::class,'StudentClassAdd'])->name('student.class.add');
    Route::post('/student/class/store',[StudentClassController::class,'StudentClassStore'])->name('store.student.class');
    Route::get('/student/class/edit/{id}',[StudentClassController::class,'StudentClassEdit'])->name('student.class.edit');
    Route::post('/student/class/update/{id}',[StudentClassController::class,'StudentClassUpdate'])->name('update.student.class');
    Route::get('/student/class/delete/{id}',[StudentClassController::class,'StudentClassDelete'])->name('student.class.delete');

    //student year
    Route::get('/student/year/view',[StudentYearController::class,'ViewYear'])->name('student.year.view');
    Route::get('/student/year/add',[StudentYearController::class,'StudentYearAdd'])->name('student.year.add');
    Route::post('/student/year/store',[StudentYearController::class,'StudentYearStore'])->name('store.student.year');
    Route::get('/student/year/edit/{id}',[StudentYearController::class,'StudentYearEdit'])->name('student.year.edit');
    Route::post('/student/year/update/{id}',[StudentYearController::class,'StudentYearUpdate'])->name('update.student.year');
    Route::get('/student/year/delete/{id}',[StudentYearController::class,'StudentYearDelete'])->name('student.year.delete');
   
    //student group
    Route::get('/student/group/view',[StudentGroupController::class,'ViewYear'])->name('student.group.view');
    Route::get('/student/group/add',[StudentGroupController::class,'StudentGroupAdd'])->name('student.group.add');
    Route::post('/student/group/store',[StudentGroupController::class,'StudentGroupStore'])->name('store.student.group');
    Route::get('/student/group/edit/{id}',[StudentGroupController::class,'StudentGroupEdit'])->name('student.group.edit');
    Route::post('/student/group/update/{id}',[StudentGroupController::class,'StudentGroupUpdate'])->name('update.student.group');
    Route::get('/student/group/delete/{id}',[StudentGroupController::class,'StudentGroupDelete'])->name('student.group.delete');
 
    
    //student shift
    Route::get('/student/shift/view',[StudentShiftController::class,'ViewShift'])->name('student.shift.view');
    Route::get('/student/shift/add',[StudentShiftController::class,'StudentShiftAdd'])->name('student.shift.add');
    Route::post('/student/shift/store',[StudentShiftController::class,'StudentShiftStore'])->name('store.student.shift');
    Route::get('/student/shift/edit/{id}',[StudentShiftController::class,'StudentShiftEdit'])->name('student.shift.edit');
    Route::post('/student/shift/update/{id}',[StudentShiftController::class,'StudentShiftUpdate'])->name('update.student.shift');
    Route::get('/student/shift/delete/{id}',[StudentShiftController::class,'StudentShiftDelete'])->name('student.shift.delete');

    
    //fee category
    Route::get('/fee/category/view',[FeeCategoryController::class,'ViewFeeCategory'])->name('fee.category.view');
    Route::get('/fee/category/add',[FeeCategoryController::class,'FeeCategoryAdd'])->name('fee.category.add');
    Route::post('/fee/category/store',[FeeCategoryController::class,'FeeCategoryStore'])->name('store.fee.category');
    Route::get('/fee/category/edit/{id}',[FeeCategoryController::class,'FeeCategoryEdit'])->name('fee.category.edit');
    Route::post('/fee/category/update/{id}',[FeeCategoryController::class,'FeeCategoryUpdate'])->name('update.fee.category');
    Route::get('/fee/category/delete/{id}',[FeeCategoryController::class,'FeeCategoryDelete'])->name('fee.category.delete');

    //fee amount
    Route::get('/fee/amount/view',[FeeAmountController::class,'ViewFeeAmount'])->name('fee.amount.view');
    Route::get('/fee/amount/add',[FeeAmountController::class,'FeeAmountAdd'])->name('fee.amount.add');
    Route::post('/fee/amount/store',[FeeAmountController::class,'FeeAmountStore'])->name('store.fee.amount');
    Route::get('/fee/amount/edit/{fee_category_id}',[FeeAmountController::class,'FeeAmountEdit'])->name('fee.amount.edit');
    Route::post('/fee/amount/update/{fee_category_id}',[FeeAmountController::class,'FeeAmountUpdate'])->name('update.fee.amount');
    Route::get('/fee/category/details/{fee_category_id}',[FeeAmountController::class,'FeeCategoryDetails'])->name('fee.amount.details');

     //exam type
     Route::get('/exam/type/view',[ExamTypeController::class,'ViewExamType'])->name('exam.type.view');
     Route::get('/exam/type/add',[ExamTypeController::class,'ExamTypeAdd'])->name('exam.type.add');
     Route::post('/exam/type/store',[ExamTypeController::class,'ExamTypeStore'])->name('store.exam.type');
     Route::get('/exam/type/edit/{id}',[ExamTypeController::class,'ExamTypeEdit'])->name('exam.type.edit');
     Route::post('/exam/type/update/{id}',[ExamTypeController::class,'ExamTypeUpdate'])->name('update.exam.type');
     Route::get('/exam/type/delete/{id}',[ExamTypeController::class,'ExamTypeDelete'])->name('exam.type.delete');

     
     //school subject
     Route::get('/school/subject/view',[SchoolSubjectController::class,'ViewSchoolSubject'])->name('school.subject.view');
     Route::get('/school/subject/add',[SchoolSubjectController::class,'SchoolSubjectAdd'])->name('school.subject.add');
     Route::post('/school/subject/store',[SchoolSubjectController::class,'SchoolSubjectStore'])->name('store.school.subject');
     Route::get('/school/subject/edit/{id}',[SchoolSubjectController::class,'SchoolSubjectEdit'])->name('school.subject.edit');
     Route::post('/school/subject/update/{id}',[SchoolSubjectController::class,'SchoolSubjectUpdate'])->name('update.school.subject');
     Route::get('/school/subject/delete/{id}',[SchoolSubjectController::class,'SchoolSubjectDelete'])->name('school.subject.delete');


     
    //assign subject
    Route::get('/assign/subject/view',[AssignSubjectController::class,'ViewFAssignSubject'])->name('assign.subject.view');
    Route::get('/assign/subject/add',[AssignSubjectController::class,'AssignSubjectAdd'])->name('assign.subject.add');
    Route::post('/assign/subject/store',[AssignSubjectController::class,'AssignSubjectStore'])->name('store.assign.subject');
    Route::get('/assign/subject/edit/{class_id}',[AssignSubjectController::class,'AssignSubjectEdit'])->name('assign.subject.edit');
    Route::post('/assign/subject/update/{class_id}',[AssignSubjectController::class,'AssignSubjectUpdate'])->name('update.assign.subject');
    Route::get('/assign/subject/details/{class_id}',[AssignSubjectController::class,'AssignSubjectDetails'])->name('assign.subject.details');

    //designation
    Route::get('/designation/view',[DesignationController::class,'ViewDesignation'])->name('designation.view');
    Route::get('/designation/add',[DesignationController::class,'DesignationAdd'])->name('designation.add');
    Route::post('/designation/store',[DesignationController::class,'DesignationStore'])->name('store.designation');
    Route::get('/designation/edit/{class_id}',[DesignationController::class,'DesignationEdit'])->name('designation.edit');
    Route::post('/designation/update/{class_id}',[DesignationController::class,'DesignationUpdate'])->name('update.designation');
    Route::get('/designation/delete/{class_id}',[DesignationController::class,'DesignationDelete'])->name('designation.delete');
});


//student registration
Route::prefix('students')->group(function(){
    Route::get('/student/registration/view',[StudentRegController::class,'ViewStudentRegistration'])->name('student.registration.view');
    Route::get('/student/registration/add',[StudentRegController::class,'StudentRegistrationAdd'])->name('student.registration.add');
    Route::post('/student/registration/store',[StudentRegController::class,'StudentRegistrationStore'])->name('store.student.registration');
    Route::get('/year/class/wise',[StudentRegController::class,'StudentYearClassWise'])->name('student.year.class.wise');
});
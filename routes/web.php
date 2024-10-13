<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SeizureRedocrdController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homeView'])->name('home');



Route::middleware(['role:user'])->group(function () {

  Route::get('/faqs', [HomeController::class, 'faqsView'])->name('faqs');

  Route::get('/dr-profiles', [HomeController::class, 'drProfileView'])->name('dr-profile');

  Route::get('/privacy-policy', [HomeController::class, 'privacyPolicyView'])->name('privacy-policy');
  //
  Route::get('/read-story', [HomeController::class, 'readStoryView'])->name('read-story');



  Route::get('/user-profile', [HomeController::class, 'userProfileView'])->name('user-profile');

  Route::get('/educational-resources', [HomeController::class, 'educationalResourcesView'])->name('educational-resources');

  Route::get('/breathing-exercise', [HomeController::class, 'breathingExerciseView'])->name('breathing-exercise');




  Route::get('/write-story', [HomeController::class, 'writeStoryView'])->name('write-story');
  Route::post('/store-stories', [StoryController::class, 'store'])->name('stories-store');
  Route::get('/delete-story/{id}', [StoryController::class, 'deleteStory'])->name('delete-story');

  Route::get('/appointment-alert-set', [HomeController::class, 'appointmentAlertSetView'])->name('appointment-alert-set');
  Route::get('/appointment-alert-history', [HomeController::class, 'appointmentAlertHistoryView'])->name('appointment-alert-history');
  Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments-store');
  Route::get('/delete-appointment/{id}', [AppointmentController::class, 'deleteAppointment'])->name('delete-appointment');


  Route::get('/seizure-record-history', [HomeController::class, 'seizureRecordHistoryView'])->name('seizure-record-history');
  Route::get('/seizure-record-form', [HomeController::class, 'seizureRecordFormView'])->name('seizure-record-form');
  Route::post('/store-seizure-record', [SeizureRedocrdController::class, 'storeSeizureRecord'])->name('store-seizure-record');
  Route::get('/delete-seizure-record/{id}', [SeizureRedocrdController::class, 'deleteSeizureRecord'])->name('delete-seizure-record');

  Route::get('/medicine-alarm-set', [HomeController::class, 'medicineAlarmSetView'])->name('medicine-alarm-set');
  Route::get('/medicine-alarm-history', [HomeController::class, 'medicineAlarmHistoryView'])->name('medicine-alarm-history');
  Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines-store');
  Route::get('/delete-medicine/{id}', [MedicineController::class, 'deleteMedicine'])->name('delete-medicine');



  Route::get('/self-diagnosis', [HomeController::class, 'selfDiagnosisView'])->name('self-diagnosis');

  Route::get('/relaxation-art', [HomeController::class, 'relaxationArtView'])->name('relaxation-art');

  Route::get('/paint-now', [HomeController::class, 'paitNowView'])->name('paint-now');
  Route::post('/save-painting', [HomeController::class, 'savePainting'])->name('save.painting');
});


Route::get('/check-alarm', [HomeController::class, 'checkAlarm'])->name('check.alarm');


//Auth routes

Route::get('auth', [HomeController::class, 'authView'])->name('auth');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['role:admin'])->group(function () {
  Route::get('/admin', [AdminController::class, 'dashboardView'])->name('dashboard');

  Route::get('/admin/all-users', [AdminController::class, 'allUserView'])->name('all-users');
  Route::get('/admin/active-users', [AdminController::class, 'activeUserView'])->name('active-users');
  Route::get('/admin/deactivated-users', [AdminController::class, 'deactivatedUserView'])->name('deactivated-users');

  Route::get('/admin/appointments', [AdminController::class, 'appointmentView'])->name('admin-appointments');

  Route::get('/admin/medicines', [AdminController::class, 'medicineView'])->name('admin-medicines');

  Route::get('/admin/seizure', [AdminController::class, 'seizureView'])->name('admin-seizures');

  Route::get('/admin/stories', [AdminController::class, 'storiesView'])->name('admin-stories');

  // Update routes
  Route::post('/medicine/update/{id}', [MedicineController::class, 'update'])->name('medicine.update');
  Route::post('/seizure-record/update/{id}', [SeizureRedocrdController::class, 'update'])->name('seizure-record.update');
  Route::post('/story/update/{id}', [StoryController::class, 'update'])->name('story.update');
  Route::post('/appointment/update/{id}', [AppointmentController::class, 'update'])->name('appointment.update');


  Route::get('/delete-medicine/{id}', [MedicineController::class, 'deleteMedicine'])->name('delete-medicine');
  Route::get('/delete-appointment/{id}', [AppointmentController::class, 'deleteAppointment'])->name('delete-appointment');
  Route::get('/delete-story/{id}', [StoryController::class, 'deleteStory'])->name('delete-story');
  Route::get('/delete-seizure-record/{id}', [SeizureRedocrdController::class, 'deleteSeizureRecord'])->name('delete-seizure-record');

  // User status route
  Route::get('/user/status/{id}', [AuthController::class, 'changeStatus'])->name('user.status');
});

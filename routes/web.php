<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SeizureRedocrdController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homeView'])->name('home');

Route::get('/faqs', [HomeController::class, 'faqsView'])->name('faqs');

Route::get('/dr-profiles', [HomeController::class, 'drProfileView'])->name('dr-profile');

Route::get('/privacy-policy', [HomeController::class, 'privacyPolicyView'])->name('privacy-policy');
//
Route::get('/read-story', [HomeController::class, 'readStoryView'])->name('read-story');

Route::get('/write-story', [HomeController::class, 'writeStoryView'])->name('write-story');

Route::get('/user-profile', [HomeController::class, 'userProfileView'])->name('user-profile');

Route::get('/educational-resources', [HomeController::class, 'educationalResourcesView'])->name('educational-resources');

Route::get('/breathing-exercise', [HomeController::class, 'breathingExerciseView'])->name('breathing-exercise');



Route::middleware(['role:user'])->group(function () {

  Route::get('/appointment-alert-set', [HomeController::class, 'appointmentAlertSetView'])->name('appointment-alert-set');
  Route::get('/appointment-alert-history', [HomeController::class, 'appointmentAlertHistoryView'])->name('appointment-alert-history');
  Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments-store');

  Route::get('/seizure-record-history', [HomeController::class, 'seizureRecordHistoryView'])->name('seizure-record-history');
  Route::get('/seizure-record-form', [HomeController::class, 'seizureRecordFormView'])->name('seizure-record-form');
  Route::post('/store-seizure-record', [SeizureRedocrdController::class, 'storeSeizureRecord'])->name('store-seizure-record');

  Route::get('/medicine-alarm-set', [HomeController::class, 'medicineAlarmSetView'])->name('medicine-alarm-set');
  Route::get('/medicine-alarm-history', [HomeController::class, 'medicineAlarmHistoryView'])->name('medicine-alarm-history');
  Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines-store');
});


Route::get('/self-diagnosis', [HomeController::class, 'selfDiagnosisView'])->name('self-diagnosis');

Route::get('/relaxation-art', [HomeController::class, 'relaxationArtView'])->name('relaxation-art');

Route::get('/paint-now', [HomeController::class, 'paitNowView'])->name('paint-now');



//Auth routes

Route::get('auth', [HomeController::class, 'authView'])->name('auth');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['role:admin'])->group(function () {
  Route::get('/admin', [AdminController::class, 'dashboardView'])->name('dashboard');
});

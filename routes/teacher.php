<?php

use App\Http\Controllers\Backend\TeacherExamController;
use App\Http\Controllers\Backend\TeacherExamSectionController;
use App\Http\Controllers\Backend\TeacherBulkAdmissionController;
use App\Http\Controllers\Backend\TeacherHallTicketController;
use App\Http\Controllers\Backend\TeacherDashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', function () {
//     return view('teacher.dashboard.dashboard');
// })->name('dashboard');

Route::get('/dashboard', [TeacherDashboardController::class, 'dashboard'])->name('dashboard');

Route::resource('exam', TeacherExamController::class);
Route::get('exam/{id}/preview', [TeacherExamController::class, 'preview'])->name('exam.preview');
Route::resource('exam-section', TeacherExamSectionController::class);

// Add this route
Route::resource('bulk-admission', TeacherBulkAdmissionController::class);

Route::get('generate-tickets', [TeacherHallTicketController::class, 'generateTickets'])
    ->name('generate-tickets');
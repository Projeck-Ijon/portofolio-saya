<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;

// Landing page route
Route::get('/', function () {
    $settings = Setting::pluck('value', 'key')->all();
    $skills = Skill::orderBy('category')->get();
    $projects = Project::latest()->get();
    
    // Group experiences by type
    $allExperiences = Experience::orderBy('period', 'desc')->get();
    $experiences = $allExperiences->where('type', 'work');
    $education = $allExperiences->where('type', 'education');
    $certifications = $allExperiences->where('type', 'certification');

    return view('index', compact('settings', 'skills', 'projects', 'experiences', 'education', 'certifications'));
})->name('home');

// Contact Form submission
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

// Admin Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Secure Admin Dashboard (Protected by standard auth middleware)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.post');
    Route::post('/password', [AdminController::class, 'updatePassword'])->name('password.post');
    
    // Skills
    Route::post('/skills', [AdminController::class, 'storeSkill'])->name('skill.store');
    Route::delete('/skills/{id}', [AdminController::class, 'deleteSkill'])->name('skill.delete');

    // Projects
    Route::post('/projects', [AdminController::class, 'storeProject'])->name('project.store');
    Route::delete('/projects/{id}', [AdminController::class, 'deleteProject'])->name('project.delete');

    // Experiences
    Route::post('/experiences', [AdminController::class, 'storeExperience'])->name('experience.store');
    Route::delete('/experiences/{id}', [AdminController::class, 'deleteExperience'])->name('experience.delete');

    // Messages
    Route::delete('/messages/{id}', [AdminController::class, 'deleteMessage'])->name('message.delete');
});

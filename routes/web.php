<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PolicyController as AdminPolicyController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\AboutContentController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/service/{id}', [PageController::class, 'serviceDetails'])->name('service.details');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/project/{id}', [PageController::class, 'projectDetails'])->name('project.details');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])
    ->middleware(['throttle:contact', 'throttle.contact'])
    ->name('contact.submit');

// Policy Routes
Route::get('/privacy-policy', [PolicyController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-of-service', [PolicyController::class, 'termsOfService'])->name('terms-of-service');

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Breeze Authentication Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Services
    Route::resource('services', ServiceController::class)->except(['show']);
    
    // Projects
    Route::resource('projects', ProjectController::class)->except(['show']);
    
    // Testimonials
    Route::resource('testimonials', TestimonialController::class)->except(['show']);
    
    // About Content
    Route::get('about-content', [AboutContentController::class, 'index'])->name('about.index');
    Route::get('about-content/{aboutContent}/edit', [AboutContentController::class, 'edit'])->name('about.edit');
    Route::put('about-content/{aboutContent}', [AboutContentController::class, 'update'])->name('about.update');
    Route::put('about-content-all', [AboutContentController::class, 'updateAll'])->name('about.update-all');
    Route::post('about-content/seed', [AboutContentController::class, 'seed'])->name('about.seed');
    
    // Contacts
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    
    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    
    // Profile
    Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [AdminProfileController::class, 'updatePassword'])->name('profile.password');
    
    // Policies (Privacy Policy & Terms of Service)
    // Policies (Privacy Policy & Terms of Service)
    Route::get('policies', [AdminPolicyController::class, 'index'])->name('policies.index');
    Route::get('policies/{policy}/edit', [AdminPolicyController::class, 'edit'])->name('policies.edit');
    Route::put('policies/{policy}', [AdminPolicyController::class, 'update'])->name('policies.update');
});
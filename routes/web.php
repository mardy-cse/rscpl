<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Roller Shutter & Construction Pte. Ltd. Website Routes
|
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Static Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Contact Form Submission
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

// Sitemap
Route::get('/sitemap.xml', function () {
    $urls = [
        ['loc' => route('home'), 'priority' => '1.0', 'changefreq' => 'weekly'],
        ['loc' => route('about'), 'priority' => '0.8', 'changefreq' => 'monthly'],
        ['loc' => route('services'), 'priority' => '0.9', 'changefreq' => 'monthly'],
        ['loc' => route('gallery'), 'priority' => '0.7', 'changefreq' => 'weekly'],
        ['loc' => route('contact'), 'priority' => '0.8', 'changefreq' => 'monthly'],
    ];

    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
    $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    
    foreach ($urls as $url) {
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . htmlspecialchars($url['loc']) . '</loc>';
        $sitemap .= '<priority>' . $url['priority'] . '</priority>';
        $sitemap .= '<changefreq>' . $url['changefreq'] . '</changefreq>';
        $sitemap .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
        $sitemap .= '</url>';
    }
    
    $sitemap .= '</urlset>';

    return response($sitemap, 200)
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

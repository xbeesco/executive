<?php

use App\Http\Controllers\Frontend\FormController;
use App\Http\Controllers\Frontend\PageController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Quick login for user ID 1 (Local Development Only)
Route::get('/quick-login', function () {
    // Only allow in local environment
    if (config('app.env') !== 'local') {
        abort(403, 'Unauthorized.');
    }

    // Find or create user with ID 1
    $user = User::firstOrCreate(
        ['id' => 1],
        [
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]
    );

    // Login the user
    Auth::login($user);
    request()->session()->regenerate();

    return redirect('/')->with('success', "Logged in as: {$user->name}");
})->name('quick.login');

// Frontend Routes
// Single Content Routes (must come before generic page route)
Route::get('/posts/{post:slug}', [PageController::class, 'showPost'])->name('posts.show');
Route::get('/services/{service:slug}', [PageController::class, 'showService'])->name('services.show');
Route::get('/events/{event:slug}', [PageController::class, 'showEvent'])->name('events.show');

// Form Submission
Route::post('/forms/{form:slug}', [FormController::class, 'submit'])->name('forms.submit');

// Dynamic Pages (must be last)
Route::get('/{page:slug}', [PageController::class, 'show'])->name('pages.show');

// Home page fallback (final fallback before 404)
Route::get('/', function () {
    $homePage = \App\Models\Page::where('slug', 'home')->first();
    if ($homePage) {
        return app(PageController::class)->show($homePage);
    }
    return view('welcome');
})->name('home');

// Fallback for 404
Route::fallback([PageController::class, 'notFound']);

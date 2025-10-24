<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

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

<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use BezhanSalleh\FilamentShield\Facades\FilamentShield;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin' , function () {
//     return view('Filament.Resources.UserResource');
// });



Route::get('/sample', function() {
    // Check if there's a user with the 'super-admin' role using FilamentShield
    $user = User::all()->load('roles:name');
    return json_encode($user);
});

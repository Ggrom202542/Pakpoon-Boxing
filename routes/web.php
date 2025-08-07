<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Route, Auth, Http, Log, DB};
use App\Http\Controllers\Auth\{LoginController, RegisterController};
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SportPeople\SportPeopleController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register/insert', [RegisterController::class, 'register'])->name('registerInsert');
});

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('sports-people', [SportPeopleController::class, 'SportPeople'])->name('SportPeople');
    Route::get('sports-people/form', [SportPeopleController::class, 'ShowSportPeopleInsert'])->name('ShowSportPeopleInsert');
    Route::post('sports-people/insert', [SportPeopleController::class, 'SportPeopleInsert'])->name('SportPeopleInsert');
});

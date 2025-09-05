<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', \App\Http\Controllers\Dashboard\DashboardController::class)->name('index');

    Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
        Route::resource('/user', \App\Http\Controllers\Dashboard\Master\UserController::class);
        Route::resource('/training-category', \App\Http\Controllers\Dashboard\Master\TrainingCategoryController::class);
    });

    Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
        Route::resource('/banner', \App\Http\Controllers\Dashboard\CMS\BannerController::class);
        Route::resource('/training', \App\Http\Controllers\Dashboard\CMS\TrainingController::class);
        Route::patch('/training/{training}/toggle-visible', [\App\Http\Controllers\Dashboard\CMS\TrainingController::class, 'toggleVisible'])->name('training.toggle-visible');

        Route::resource('/news', \App\Http\Controllers\Dashboard\CMS\NewsController::class);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';

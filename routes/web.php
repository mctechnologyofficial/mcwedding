<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\User\AdditionalEventController;
use App\Http\Controllers\User\GeneralSettingController;
use App\Http\Controllers\User\BrideManController;
use App\Http\Controllers\User\BrideWomanController;
use App\Http\Controllers\User\EventInformationController;
use App\Http\Controllers\User\InvitationInformationController;
use App\Http\Controllers\User\LoveStoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/force/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
});

Route::get('/', function () {
    return view('landing.index');
})->name('landing.index');

Auth::routes();

Route::get('/dashboard/home', [HomeController::class, 'index'])->name('home');

Route::controller(InvitationController::class)->group(function(){
    Route::get('/{name}', 'indexFree')->name('invitation.free');
});

Route::group(['middleware' => ['role:user']], function () {

    Route::prefix('dashboard')->group(function(){

        // General Setting Route
        Route::controller(GeneralSettingController::class)->group(function(){
            Route::get('/settings', 'index')->name('user.settings.index');
            Route::post('/settings/store', 'store')->name('user.settings.store');
            Route::put('/settings/update', 'update')->name('user.settings.update');
        });

        // Bride Man Route
        Route::controller(BrideManController::class)->group(function(){
            Route::get('/mempelaipria', 'index')->name('user.brideman.index');
            Route::post('/mempelaipria/store', 'store')->name('user.brideman.store');
            Route::put('/mempelaipria/update', 'update')->name('user.brideman.update');
        });

        // Bride Woman Route
        Route::controller(BrideWomanController::class)->group(function(){
            Route::get('/mempelaiwanita', 'index')->name('user.bridewoman.index');
            Route::post('/mempelaiwanita/store', 'store')->name('user.bridewoman.store');
            Route::put('/mempelaiwanita/update', 'update')->name('user.bridewoman.update');
        });

        // Love Story Route
        Route::controller(LoveStoryController::class)->group(function(){
            Route::get('/ceritacinta', 'index')->name('user.lovestory.index');
            Route::get('/ceritacinta/create', 'create')->name('user.lovestory.create');
            Route::post('/ceritacinta/store', 'store')->name('user.lovestory.store');
            Route::get('/ceritacinta/{id}/edit', 'edit')->name('user.lovestory.edit');
            Route::put('/ceritacinta/{id}/update', 'update')->name('user.lovestory.update');
            Route::delete('/ceritacinta/{id}/destroy', 'destroy')->name('user.lovestory.destroy');
        });

        // Event Information Route
        Route::controller(EventInformationController::class)->group(function(){
            Route::get('/informasiacara', 'index')->name('user.eventinformation.index');
            Route::get('/informasiacara/create', 'create')->name('user.eventinformation.create');
            Route::post('/informasiacara/store', 'store')->name('user.eventinformation.store');
            Route::get('/informasiacara/{id}/edit', 'edit')->name('user.eventinformation.edit');
            Route::put('/informasiacara/{id}/update', 'update')->name('user.eventinformation.update');
        });

        // Invitation Information Route
        Route::controller(InvitationInformationController::class)->group(function(){
            Route::get('/informasiundangan', 'index')->name('user.invitationinformation.index');
            Route::get('/informasiundangan/create', 'create')->name('user.invitationinformation.create');
            Route::post('/informasiundangan/store', 'store')->name('user.invitationinformation.store');
            Route::get('/informasiundangan/{id}/edit', 'edit')->name('user.invitationinformation.edit');
            Route::put('/informasiundangan/{id}/update', 'update')->name('user.invitationinformation.update');
        });

        Route::controller(AdditionalEventController::class)->group(function(){
            Route::get('/acaratambahan', 'index')->name('user.additionalevent.index');
        });
    });
});

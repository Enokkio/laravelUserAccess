<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('register');
});

// Route::delete('/users/{id}', 'RegisteredUserController@destroy')->name('users.destroy');
// Route::delete('/users/{id}', 'RegisteredUserController@destroy')->name('users.destroy');
Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::get('/dashboard', function () {//Detta är självklart inte metoden vi vill använda, men laravels breeze filer och funktioner är så djupt bedrövliga att 
                                        //att jag inte kan navigera vart mitt liv är.

    $d = DB::table('users')->get();
    return view('dashboard',['data'=>$d]);
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

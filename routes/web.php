<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BarangMasukComponent;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

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
    //return view('welcome');
	 return redirect()->route('login');
});

Route::get('/barang-masuk', function () {
    return view('barang-masuk');
})->middleware('auth');

Route::post('/upload', function (Request $request) {
    if ($request->hasFile('file')) {
        $path = $request->file('file')->store('temp');
        return response()->json(['path' => $path], 200);
    }
    return response()->json(['error' => 'File not uploaded'], 400);
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


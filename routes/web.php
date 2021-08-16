<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\OpportunitiesController;
use App\Http\Controllers\ContractorsController;
use App\Http\Controllers\ValuationsController;
use App\Http\Controllers\DevelopmentsController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\FinancialsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfilesController;
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
    return view('index');
});

Route::resource('contacts', ContactsController::class);
Route::resource('leads', LeadsController::class);
Route::resource('opportunities', OpportunitiesController::class);
Route::resource('contractors', ContractorsController::class);
Route::resource('valuations', ValuationsController::class);
Route::resource('developments', DevelopmentsController::class);
Route::resource('accounts', AccountsController::class);
Route::resource('financials', FinancialsController::class);
Route::resource('users', UsersController::class);
Route::resource('profiles', ProfilesController::class);   


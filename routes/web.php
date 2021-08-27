<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers as AppHttpControllers;
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

Route::get('leads/result', [AppHttpControllers\LeadsController::class, 'result'])->name('leads.result');

Route::resource('contacts', AppHttpControllers\ContactsController::class);
Route::resource('leads', AppHttpControllers\LeadsController::class);
Route::resource('opportunities', AppHttpControllers\OpportunitiesController::class);
Route::resource('contractors', AppHttpControllers\ContractorsController::class);
Route::resource('valuations', AppHttpControllers\ValuationsController::class);
Route::resource('developments', AppHttpControllers\DevelopmentsController::class);
Route::resource('accounts', AppHttpControllers\AccountsController::class);
Route::resource('financials', AppHttpControllers\FinancialsController::class);
Route::resource('users', AppHttpControllers\UsersController::class);
Route::resource('profiles', AppHttpControllers\ProfilesController::class);

Route::get('fieldsSearch/moduleResultColumnsIndex', [AppHttpControllers\FieldsSearchController::class, 'moduleResultColumnsIndex'])->name('fields_search.moduleResultColumnsIndex');

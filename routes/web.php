<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () { return view('welcome'); });
Route::get('/selectType', function () { return view('selectType'); });

// register user routes
Route::get('/newDoctor', 'DoctorController@index')->name('form-doctor');
Route::get('/newPatient', 'PatientController@index')->name('form-patient');
Route::post('/storePatient', 'PatientController@store')->name('store-patient');
Route::post('/storeDoctor', 'DoctorController@store')->name('store-doctor');
// End register user routes

Auth::routes();

Route::get('doctor-consultations', 'DoctorController@doctorConsultation')->name('doctor-consultation');
Route::post('/approve-consultation/{id}', 'DoctorController@approveConsultation')->name('approve-consultation');
Route::post('/cancel-consultation/{id}', 'DoctorController@reproveConsultation')->name('cancel-consultation');

Route::get('/new-consultation', 'PatientController@createConsultation')->name('new-consultation');
Route::post('/new-consultation', 'PatientController@storeConsultation')->name('store-consultation');
Route::get('/myconsultations', 'PatientController@viewConsultation')->name('view-consultation');
Route::post('/delete/{id}', 'PatientController@cancel')->name('delete-consultation');
Route::post('/edit/{id}', 'PatientController@edit')->name('edit-consultation');

Route::get('/home', 'HomeController@index')->name('home');

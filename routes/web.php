<?php

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
    return \Inertia\Inertia::render('Main');
});

Route::get('/about', function () {
    return \Inertia\Inertia::render('About');
});


Route::get('/manage', 'Manager@main');
Route::get('/manage/work', 'Manager@work');
Route::post('/create-estimate', 'Manager@createEstimate');
Route::post('/create-work-order', 'Manager@createWorkOrder');

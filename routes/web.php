<?php

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
    $projects = [
        ['id' => 1, 'title' => 'Project 1', 'description' => 'project description'],
        ['id' => 2, 'title' => 'Project 2', 'description' => 'project description'],
        ['id' => 3, 'title' => 'Project 3', 'description' => 'project description']
    ];
    return view('welcome', [
        'projects' => $projects
    ]);
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

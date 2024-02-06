<?php

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;


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


// php artisan make:controller UserContoller - make a laravel controller in terminal


// COMMON RESOURCE ROUTES, naming convention - jobs is just the resource for this.
// index   - Show all jobs
// show    - Show single job
// create  - Show form to create a new job
// store   - Store a new job (when a new job form is submitted)
// edit    - Show form to edit a job
// update  - Update a job (when an edit job form is submitted)
// destroy - Delete a job

// All jobs
Route::get('/', [JobController::class, 'index']);

// Show create form
Route::get('/jobs/create', [JobController::class, 'create']);

// Store Job Data (send create form to database) 
Route::post('/jobs', [JobController::class, 'store']);

//Show Edit Form
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

//Update Job (send edit form to database) 
Route::put('/jobs/{job}', [JobController::class, 'update']);

//Delete Job
Route::delete('/job/{job}', [JobController::class, 'destroy']);


// Single job
Route::get('/jobs/{job}', [JobController::class, 'show']);


//Show Register/Create User Form
Route::get('/register', [UserController::class, 'create']);

//Create New User
Route::post('/users', [UserController::class, 'store']);






<?php

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

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

// All jobs
Route::get('/', [JobController::class, 'index']);

// Single job
Route::get('/jobs/{job}', [JobController::class, 'show']);

// Show create form
Route::get('/jobs/create', [JobController::class, 'create'] );


// COMMON RESOURCE ROUTES, naming convention - jobs is just the resource for this.
// index   - Show all jobs
// show    - Show single job
// create  - Show form to create a new job
// store   - Store a new job (when a new job form is submitted)
// edit    - Show form to edit a job
// update  - Update a job (when an edit job form is submitted)
// destroy - Delete a job
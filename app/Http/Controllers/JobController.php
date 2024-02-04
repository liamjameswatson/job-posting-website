<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
     //Show all jobs
     public function index() {
        return view('jobs.index', [
            'jobs' => Job::all()
        ]);
    }

    //Show single job
    public function show(Job $job) {
        return view('jobs.show', [
            'job' => $job
        ]);

    }
}

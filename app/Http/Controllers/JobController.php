<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
     //Show all jobs
     public function index(Request $request) {
        //  dd(request('tag'));
        return view('jobs.index', [
            'jobs' => Job::latest()->filter(request(['tag', 'search']))->get() // sorts by latest
        ]);
    }

    //Show single job
    public function show(Job $job) {
        return view('jobs.show', [
            'job' => $job
        ]);

    }

    // Show Create Form
    public function create() {
        return view('jobs.create');
    }
}

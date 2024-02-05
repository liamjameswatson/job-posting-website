<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
     //Show all jobs
     public function index(Request $request) {
        //  dd(request('tag'));
        return view('jobs.index', [
            'jobs' => Job::latest()->filter(request(['tag', 'search']))->paginate(6) //or simplePaginate for prev/next
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

    //Store job data
    public function  store(Request $request) {
        // dd($request->all());
        //validation
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('jobs', 'company')], // unique(table in db, field in table)
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'], // in email format
            'tags' => 'required',       
            'description' => 'required',
        ]);

        Job::create($formFields); // create the job in the database using the Job model. 

        return redirect('/')->with('message', 'Job post created successfully');
    }

}

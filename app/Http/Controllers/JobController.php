<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    // Show all jobs
    public function index()
    {
        $jobs = Job::latest()->get(); // Latest first
        return view('jobs', compact('jobs'));
    }

    // Show jobs in 'mobile' category
    public function showMobiles()
    {
        $mobiles = Job::where('category', 'mobile')->get();
        return view('mobiles', compact('mobiles'));
    }

    // Show company listings (hardcoded)
    // Show companies based on actual jobs
public function companies()
{
    $companies = Job::select('company', 'industry', 'location', 'description')
        ->distinct()
        ->get(); // no ->toArray()

    return view('companies', compact('companies'));
}



    // Show form to post a new job - Admin only
    public function create()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('post');
        }

        abort(403, 'Unauthorized action.');
    }

    // Save posted job - Admin only
    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'industry' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
        ]);

        Job::create($validated);

        return redirect()->route('jobs.create')->with('success', 'Job posted successfully!');
    }

    // Show application form for a specific job
    public function apply($id)
    {
        $job = Job::findOrFail($id);

        $alreadyApplied = false;

        if (Auth::check()) {
            $alreadyApplied = JobApplication::where('user_id', Auth::id())
                ->where('job_id', $job->id)
                ->exists();
        }

        return view('apply', compact('job', 'alreadyApplied'));
    }
}

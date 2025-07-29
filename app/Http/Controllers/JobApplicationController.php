<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class JobApplicationController extends Controller
{
    public function apply(Request $request, $jobId)
    {
        $user = Auth::user();
        $user_id = $user ? $user->id : null;

        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'education_level' => 'required|string|max:255',
            'applicant_location' => 'required|string|max:255',
            'cover_letter' => 'nullable|string|max:2000',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Prevent duplicate application if logged in
        if ($user_id) {
            $alreadyApplied = JobApplication::where('user_id', $user_id)
                ->where('job_id', $jobId)
                ->exists();

            if ($alreadyApplied) {
                return back()->withInput()->with('error', 'You already applied for this job.');
            }
        }

        $sessionId = Session::getId();
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Create application
        JobApplication::create([
            'user_id' => $user_id,
            'session_id' => $sessionId,
            'job_id' => $jobId,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'education_level' => $validated['education_level'],
            'applicant_location' => $validated['applicant_location'],
            'cover_letter' => $validated['cover_letter'],
            'resume' => $resumePath,
        ]);

        // Optional: send confirmation email
        if ($user && $user->email) {
            Mail::raw('Congratulations! Your job application was received successfully.', function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Job Application Received');
            });
        }

        return redirect()->route('jobs.my_applications')->with('success', 'You have successfully applied for this job.');
    }

    public function myApplications()
    {
        $user = Auth::user();
        $sessionId = Session::getId();

        $applications = JobApplication::with('job')
            ->when($user, function ($query) use ($user) {
                return $query->where('user_id', $user->id);
            }, function ($query) use ($sessionId) {
                return $query->where('session_id', $sessionId);
            })
            ->get();

        return view('jobs.my_applications', compact('applications'));
    }

    public function allApplications()
    {
        $applications = JobApplication::with(['user', 'job'])->get();
        return view('admin.job_applications', compact('applications'));
    }
}

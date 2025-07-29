@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-xl mt-10 px-6">
    {{-- Flash success message --}}
    @if (session('success'))
        <div class="mb-4 bg-green-600 text-white p-3 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold mb-6 text-center">Apply for {{ $job->title }}</h2>
     <!-- Job Requirements Section -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Requirements</h3>
            <ul class="list-disc list-inside text-sm text-gray-200">
                @foreach(explode(',', $job->requirements) as $requirement)
                    <li>{{ trim($requirement) }}</li>
                @endforeach
            </ul>
        </div>
        <form method="POST" action="{{ route('jobs.apply.submit', $job->id) }}" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-6 rounded-lg shadow">


        @csrf

        {{-- Name --}}
        <div>
            <label for="name" class="block mb-1">Full Name</label>
            <input type="text" name="name" id="name" required
                class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring focus:border-blue-400"
                value="{{ old('name') }}">
                @error('name')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block mb-1">Email Address</label>
            <input type="email" name="email" id="email" required
                class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring focus:border-blue-400"
                value="{{ old('email') }}">
                @error('email')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

        </div>

        {{-- Education --}}
        <div>
            <label for="education" class="block mb-1">Education Level</label>
            <input type="text" name="education_level" id="education" required
                class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring focus:border-blue-400"
                value="{{ old('education_level') }}">
                @error('education_level')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

        </div>

        {{-- Location --}}
        <div>
            <label for="applicant_location" class="block mb-1">Your Location</label>
            <input type="text" name="applicant_location" id="applicant_location" required
                class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring focus:border-blue-400"
                value="{{ old('applicant_location') }}">
                @error('applicant_location')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

        </div>

        {{-- Cover Letter --}}
        <div>
            <label for="cover_letter" class="block mb-1">Cover Letter</label>
            <textarea name="cover_letter" id="cover_letter" rows="4" required
                class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring focus:border-blue-400">{{ old('cover_letter') }}</textarea>
                @error('cover_letter')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

        </div>

        {{-- Resume File Upload --}}
        <div>
            <label for="resume" class="block mb-1">Upload Resume (PDF, DOC, DOCX)</label>
            <input type="file" name="resume" id="resume" required accept=".pdf,.doc,.docx"
                class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring focus:border-blue-400">
                @error('resume')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

        </div>

        {{-- Optional: Resume Link (if you still want it) --}}
        {{-- 
        <div>
            <label for="resume_link" class="block mb-1">Resume Link (Google Drive, Dropbox, etc.)</label>
            <input type="url" name="resume_link" id="resume_link"
                class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring focus:border-blue-400"
                value="{{ old('resume_link') }}">
        </div>
        --}}

        <div class="text-center">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded transition duration-200">
                Submit Application
            </button>
        </div>
        <!-- My Applications Button -->
    <a href="{{ route('jobs.my_applications') }}" class="btn btn-secondary mb-3">
        My Applications
    </a>
    </form>
</div>
@endsection

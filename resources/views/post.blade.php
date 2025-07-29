@extends('layouts.app') <!-- Make sure this matches your layout file name -->

@section('content')
@if (session('success'))
    <div class="bg-green-600 text-white p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="max-w-2xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-white text-center">Post a New Job</h1>

    <form method="POST" action="{{ route('jobs.store') }}" class="space-y-4 bg-gray-900 p-6 rounded-xl shadow-lg">
        @csrf

        <div>
            <label class="block mb-1 text-sm text-gray-300">Job Title</label>
            <input type="text" name="title" class="w-full p-2 rounded bg-black border border-gray-700 text-white" required>
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-300">Company Name</label>
            <input type="text" name="company" class="w-full p-2 rounded bg-black border border-gray-700 text-white" required>
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-300">Location</label>
            <input type="text" name="location" class="w-full p-2 rounded bg-black border border-gray-700 text-white" required>
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-300">Salary (KES)</label>
            <input type="number" name="salary" class="w-full p-2 rounded bg-black border border-gray-700 text-white" required>
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-300">Industry</label>
            <input type="text" name="industry" class="w-full p-2 rounded bg-black border border-gray-700 text-white" required>
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-300">Job Description</label>
            <textarea name="description" rows="4" class="w-full p-2 rounded bg-black border border-gray-700 text-white" required></textarea>
        </div>


        <div class="mb-4">
    <label for="requirements" class="block mb-2 text-sm font-bold text-white">Job Requirements</label>
    <textarea 
        name="requirements" 
        id="requirements" 
        class="w-full p-2 border rounded bg-black text-white" 
        rows="4" 
        placeholder="e.g. 2+ years experience, Degree in IT...">{{ old('requirements') }}</textarea>
</div>

<div class="mb-4">
    <a href="{{ route('admin.job.applications') }}" 
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        View All Job Applications
    </a>
</div>




       





        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
            Submit Job
        </button>
    </form>
</div>
@endsection


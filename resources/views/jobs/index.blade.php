@extends('layout')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Available Jobs</h1>

    @if ($jobs->isEmpty())
        <p class="text-gray-400">No jobs found.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($jobs as $job)
                <div class="bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-white mb-2">{{ $job->title }}</h2>
                    <p class="text-gray-300 mb-3">{{ Str::limit($job->description, 120) }}</p>
                    <p class="text-sm text-blue-400">Posted by {{ $job->company ?? 'Unknown Company' }}</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection

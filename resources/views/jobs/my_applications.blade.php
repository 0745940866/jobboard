@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold text-white mb-6">📄 My Job Applications</h2>

    @if($applications->isEmpty())
        <div class="bg-yellow-500 text-white p-4 rounded">You haven't applied to any jobs yet.</div>
    @else
        <div class="grid grid-cols-1 gap-6">
            @if (session('success'))
                <div class="mb-4 bg-green-600 text-white p-3 rounded shadow">
                    {{ session('success') }}
                </div>
            @endif

            @foreach($applications as $app)
                <div class="bg-gray-800 p-4 rounded shadow">
                    <h3 class="text-xl font-semibold text-white">
                        {{ $app->job->title ?? 'Job Title Missing' }}
                    </h3>
                    <p class="text-gray-300">Location: {{ $app->applicant_location }}</p>
                    <p class="text-gray-300">Education: {{ $app->education_level }}</p>
                    <p class="text-gray-300">Applied On: {{ $app->created_at->format('M d, Y') }}</p>

                    <p class="text-gray-400 mt-2">Cover Letter:</p>
                    <p class="text-white whitespace-pre-line">{{ $app->cover_letter }}</p>

                    <a href="{{ asset('storage/' . $app->resume) }}" target="_blank" class="text-blue-400 underline mt-2 inline-block">View Resume</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

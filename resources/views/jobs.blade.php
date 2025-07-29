@extends('layouts.app')

@section('content')
{{-- @include('partials.pages-navbar')  --}}
<div class="max-w-7xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-8 text-center text-white">Available Jobs</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($jobs as $job)
            <a href="{{ url('/apply/' . $job->id) }}" 
                class="block bg-black rounded-lg shadow-inner shadow-[#555] text-white p-6 
                  hover:shadow-white hover:scale-[1.01] transition-all duration-300">
                      
                <h3 class="text-xl font-semibold mb-2">{{ $job->title }}</h3>
                <p><strong>Company:</strong> {{ $job->company }}</p>
                <p><strong>Location:</strong> {{ $job->location }}</p>
                <p><strong>Salary:</strong> Ksh {{ number_format($job->salary) }}</p>
            </a>
        @endforeach
    </div>
</div>
@endsection

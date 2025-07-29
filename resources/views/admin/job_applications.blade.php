@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-6 text-center">All Job Applications</h2>

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200 text-gray-800">
                <tr>
                    <th class="px-4 py-2 text-left">Applicant Name</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Location</th>
                    <th class="px-4 py-2 text-left">Education</th>
                    <th class="px-4 py-2 text-left">Cover Letter</th>
                    <th class="px-4 py-2 text-left">Resume</th>
                    <th class="px-4 py-2 text-left">Job Title</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($applications as $app)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $app->name }}</td>
                        <td class="px-4 py-2">{{ $app->email }}</td>
                        <td class="px-4 py-2">{{ $app->applicant_location }}</td>
                        <td class="px-4 py-2">{{ $app->education_level }}</td>
                        <td class="px-4 py-2">
                            @if($app->cover_letter)
                                <details>
                                    <summary class="text-blue-600 cursor-pointer">View</summary>
                                    <div class="mt-1 p-2 text-sm text-gray-600 bg-gray-100 rounded">
                                        {{ $app->cover_letter }}
                                    </div>
                                </details>
                            @else
                                <span class="text-gray-400 italic">None</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ asset('storage/' . $app->resume) }}" target="_blank" class="text-blue-600 underline">
                                View Resume
                            </a>
                        </td>
                        <td class="px-4 py-2">{{ $app->job->title ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

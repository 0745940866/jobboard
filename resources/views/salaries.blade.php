@extends('layouts.app')

@section('content')
<div class="bg-black text-white min-h-screen py-10">
    <div class="max-w-6xl mx-auto px-4">

        <h1 class="text-3xl font-bold text-center mb-8">Salary Estimates by Role & Experience</h1>

        {{-- Optional experience dropdown filter (visual only for now) --}}
        <div class="flex justify-center mb-6">
            <label for="experienceFilter" class="mr-2 text-lg">Filter by Experience:</label>
            <select id="experienceFilter" class="text-black px-4 py-2 rounded-md">
                <option value="all">All</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="senior">Senior</option>
            </select>
        </div>

        {{-- Salaries Table --}}
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-600 text-white text-center">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="px-4 py-2 border border-gray-600 w-1/3">Job Title</th>
                        <th class="px-4 py-2 border border-gray-600">Experience</th>
                        <th class="px-4 py-2 border border-gray-600">Monthly Salary (Ksh)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $rowspanMap = [];
                        foreach ($jobs as $job) {
                            $rowspanMap[$job->title] = isset($rowspanMap[$job->title]) 
                                ? $rowspanMap[$job->title] + 1 
                                : 3;
                        }

                        $printedTitles = [];
                    @endphp

                    @foreach ($jobs as $job)
                        @php
                            $senior = $job->salary;
                            $intermediate = round($senior * 0.65);
                            $beginner = round($senior * 0.4);
                        @endphp

                        {{-- Only print the job title once per group (rowspan) --}}
                        @if (!in_array($job->title, $printedTitles))
                            <tr>
                                <td class="px-4 py-3 border border-gray-700 font-bold bg-gray-900" rowspan="3">
                                    {{ $job->title }}
                                </td>
                                <td class="px-4 py-3 border border-gray-700">Beginner</td>
                                <td class="px-4 py-3 border border-gray-700">Ksh {{ number_format($beginner) }}</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 border border-gray-700">Intermediate</td>
                                <td class="px-4 py-3 border border-gray-700">Ksh {{ number_format($intermediate) }}</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 border border-gray-700">Senior</td>
                                <td class="px-4 py-3 border border-gray-700 font-semibold text-green-400">Ksh {{ number_format($senior) }}</td>
                            </tr>
                            @php $printedTitles[] = $job->title; @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

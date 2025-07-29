@extends('layouts.app')

@section('content')
<section class="bg-black text-white py-12 px-6 min-h-screen">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold mb-10 text-center">Top Companies</h2>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse table-auto text-sm md:text-base text-left text-white">
                <thead>
                    <tr class="bg-gray-800 uppercase tracking-wider text-gray-300 text-xs md:text-sm">
                        <th class="py-3 px-4">Company</th>
                        <th class="py-3 px-4">Industry</th>
                        <th class="py-3 px-4">Location</th>
                        <th class="py-3 px-4">Description</th>
                        <th class="py-3 px-4">Jobs</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                    <tr class="border-b border-gray-700 hover:bg-gray-900 transition duration-150">
                        <td class="py-4 px-4 font-semibold">{{ $company->company }}</td>
                        <td class="py-4 px-4 text-gray-300">{{ $company->industry }}</td>
                        <td class="py-4 px-4 text-gray-400">{{ $company->location }}</td>
                        <td class="py-4 px-4 text-gray-400 line-clamp-3">
                            {{ $company->description }}
                        </td>
                        <td class="py-4 px-4">
                            <a href="{{ url('/jobs?company=' . urlencode($company->company)) }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded text-sm transition duration-200">
                                View Jobs
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

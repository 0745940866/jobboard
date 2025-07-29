@extends('layout')

@section('content')
    @include('partials.pages-navbar')

    <div class="min-h-screen bg-black text-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold mb-8 text-center">Latest Mobile Offers</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($mobiles as $mobile)
                    <div class="bg-black border border-gray-700 rounded-xl p-6 shadow-md hover:shadow-xl transition duration-300">
                        <h2 class="text-2xl font-semibold mb-2">{{ $mobile['name'] }}</h2>
                        <p class="text-sm text-gray-300 mb-1"><strong>Brand:</strong> {{ $mobile['brand'] }}</p>
                        <p class="text-sm text-gray-300 mb-1"><strong>Specs:</strong> {{ $mobile['specs'] }}</p>
                        <p class="text-sm text-gray-300"><strong>Price:</strong> Ksh {{ number_format(rand(15000, 90000)) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

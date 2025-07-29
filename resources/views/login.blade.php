@extends('layouts.app')

@section('content')
    <div class="text-white max-w-md mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">Login</h1>
        <form class="space-y-4">
            <input type="email" placeholder="Email" class="w-full px-4 py-2 bg-gray-800 text-white rounded" />
            <input type="password" placeholder="Password" class="w-full px-4 py-2 bg-gray-800 text-white rounded" />
            <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 px-4 py-2 rounded text-white">Login</button>
        </form>
    </div>
@endsection

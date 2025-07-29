@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-black text-white py-16 px-6">
        <div class="max-w-5xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Explore Careers with JobQuest</h1>
            <p class="text-lg md:text-xl text-gray-300 mb-6">
                Your future is waiting. Discover exciting paths and career growth opportunities.
            </p>
            <a href="https://www.fuzu.com" target="_blank" class="inline-block bg-white text-black font-semibold px-6 py-3 rounded-xl hover:bg-gray-200 transition">
                Browse Opportunities
            </a>
        </div>
    </section>

    <!-- Highlights Section -->
    <section class="bg-black py-16 px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gray-900 p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                <h2 class="text-xl font-bold mb-2">Career Planning</h2>
                <p class="text-gray-300">
                    Create a strategy that aligns your goals with high-demand industries.
                </p>
            </div>

            <div class="bg-gray-900 p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                <h2 class="text-xl font-bold mb-2">Upskill Resources</h2>
                <p class="text-gray-300">
                    Access curated courses and certifications to stay competitive in the market.
                </p>
            </div>

            <div class="bg-gray-900 p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                <h2 class="text-xl font-bold mb-2">Mentorship</h2>
                <p class="text-gray-300">
                    Connect with professionals and mentors who can guide your journey.
                </p>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-black py-16 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Join Thousands Growing Their Careers</h2>
            <p class="text-gray-300 mb-6">
                Start your career transformation today with the tools and insights you need.
            </p>
            <a href="https://www.coursera.org" target="_blank" class="inline-block bg-white text-black font-semibold px-6 py-3 rounded-xl hover:bg-gray-200 transition">
                Get Started Now
            </a>
        </div>
    </section>
@endsection

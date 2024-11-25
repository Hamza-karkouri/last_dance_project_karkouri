@extends('dashboard')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-8">

    @if (Auth::user()->plan == 'free')
    <!-- If the user has the 'free' plan -->
    <div class="bg-yellow-100 p-6 rounded-lg border border-yellow-300">
        <h2 class="text-2xl font-semibold text-yellow-700">Coach Application</h2>
        <p class="mt-2 text-lg text-yellow-700">You need to be a Premium or Premium Plus user to apply for coaching. Please upgrade your plan to proceed.</p>
        <a href="/payment" class="mt-4 inline-block bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition duration-300">
            Go to Payment Page
        </a>
    </div>
    @else
   
        @if (Auth::user()->apply == 'under_review')
        <div class="bg-purple-100 p-6 rounded-lg border border-purple-300">
            <h2 class="text-2xl font-semibold text-purple-700">Coach Application Status</h2>
            <p class="mt-2 text-lg text-purple-700">Your application is currently under review. Please wait for further updates.</p>
        </div>
        @elseif (Auth::user()->apply == 'accepted')
        <div class="bg-green-100 p-6 rounded-lg border border-green-300">
            <h2 class="text-2xl font-semibold text-green-700">Coach Status</h2>
            <p class="mt-2 text-lg text-green-700">You are already a coach. Congratulations!</p>
        </div>
        @else
        <!-- If the user has a 'premium' or 'premium_plus' plan and no application status -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-purple-800">Coach Application Form</h2>
            <p class="mt-2 text-lg text-gray-600">Please fill out the application below to apply for coaching.</p>

            <!-- Coach Application Form -->
            <form action="/coach-application/store" method="POST" class="mt-6 space-y-6">
                @csrf

                <!-- Hidden Input for Application Type -->
                <input type="hidden" name="application_type" value="coach_application">

                <!-- Hidden User ID -->
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-lg font-medium text-purple-700">Your Email</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required class="mt-2 w-full p-3 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter your email" readonly>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition duration-300">
                        Submit Application
                    </button>
                </div>
            </form>
        </div>
        @endif
    @endif

</div>
@endsection

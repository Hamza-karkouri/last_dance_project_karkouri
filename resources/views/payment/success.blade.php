
@extends('dashboard')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full text-center">
            <h1 class="text-4xl font-semibold text-green-600 mb-6">Payment Successful!</h1>
            <p class="text-xl text-gray-700 mb-6">Your plan has been updated to: <span class="font-bold text-purple-600">{{ ucfirst($plan) }}</span>.</p>
            <div class="mt-6">
                <a href="/dashboard" class="px-6 py-3 bg-purple-600 text-white rounded-lg shadow-md hover:bg-purple-700 transition duration-200 w-full inline-block">
                    Go to Dashboard
                </a>
            </div>
        </div>
    </div>
@endsection

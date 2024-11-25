@extends('dashboard')

@section('content')
    <div class="flex justify-center items-center min-h-screen ">
        <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full text-center">
            <h1 class="text-4xl font-semibold text-red-600 mb-6">Payment Canceled</h1>
            <p class="text-xl text-gray-700 mb-6">Your payment was not successful. Please try again.</p>
            <div class="mt-6">
                <a href="/payment" class="px-6 py-3 bg-purple-600 text-white rounded-lg shadow-md hover:bg-purple-700 transition duration-200 w-full inline-block">
                    Back to Payment Page
                </a>
            </div>
        </div>
    </div>
@endsection

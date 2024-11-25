@extends('dashboard')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-8 sm:px-6 lg:px-8 bg-gray-100">
    <div class="bg-white w-full max-w-lg p-8 rounded-lg shadow-lg border border-gray-200">
        <h1 class="text-2xl font-bold text-purple-700 mb-6 text-center">Create Class</h1>

        <form action="{{ route('classes.store') }}" method="POST" class="space-y-6">
            @csrf


            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Class Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-gray-700"
                    placeholder="Enter class name"
                    required>
            </div>

            <div>
                <label for="coach_id" class="block text-sm font-medium text-gray-700">Coach</label>
                <select
                    name="coach_id"
                    id="coach_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-gray-700">

                        <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>

                </select>
            </div>


            <div>
                <label for="seats" class="block text-sm font-medium text-gray-700">Seats</label>
                <input
                    type="number"
                    name="seats"
                    id="seats"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-gray-700"
                    placeholder="Enter number of seats"
                    required>
            </div>


            <button
                type="submit"
                class="w-full bg-purple-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-purple-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-purple-500">
                Create Class
            </button>
        </form>
    </div>
</div>
@endsection

@extends('dashboard')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center px-4 py-8 sm:px-6 lg:px-8 bg-gray-100">
    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-8 border border-gray-200">
        <h1 class="text-3xl font-semibold text-purple-700 text-center mb-6">Create Course for: {{ $class->name }}</h1>

        <form action="{{ route('courses.store', $class->id) }}" method="POST">
            @csrf
            <div class="form-group mb-6">
                <label for="name" class="text-sm font-semibold text-gray-700">Course Name</label>
                <input type="text" name="name" id="name" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            </div>

            <div class="form-group mb-6">
                <label for="description" class="text-sm font-semibold text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" rows="4"></textarea>
            </div>

            <button type="submit" class="w-full bg-purple-600 text-white py-3 px-6 rounded-lg hover:bg-purple-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-purple-500">
                Create Course
            </button>
        </form>
    </div>
</div>
@endsection

@extends('dashboard')

@section('content')

    @if($requestCoach->isNotEmpty())
        <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($requestCoach as $user)
                    <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200 transform transition duration-300 hover:scale-105 hover:border-purple-600 hover:shadow-2xl hover:border-2">
                        <div class="flex items-center space-x-6">
                            <img src="{{ asset('storage/profile_pictures/' . $user->profile) }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover border-4 border-purple-600">
                            <div>
                                <h3 class="text-2xl font-semibold text-purple-800">{{ $user->name }}</h3>
                                <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="mt-6 space-y-2">
                            <p class="text-sm text-gray-600"><strong>Status:</strong> {{ ucfirst($user->stats) }}</p>
                            <p class="text-sm text-gray-600"><strong>Joined:</strong> {{ $user->created_at->format('F j, Y') }}</p>
                        </div>
                        <form action="coach-approve/store" method="POST" class="mt-6 text-center">
                            @csrf
                            @method('POST')
                            <input type="text" name="user_id" value="{{ $user->id }}" class="hidden">
                            <button type="submit" class="w-full text-white bg-purple-600 hover:bg-purple-700 font-semibold py-3 px-6 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                Approve Coach
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center text-gray-500">No coaches are pending approval.</p>
    @endif

@endsection

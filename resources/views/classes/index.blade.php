@extends('dashboard')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-7xl">
        <div class="mb-6 text-center">
            <h1 class="text-4xl font-semibold text-purple-700">Classes</h1>
            <div class="text-center mt-4">
                <a href="{{ route('classes.create') }}" class="bg-purple-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-purple-700 transition duration-200">
                    Create New Class
                </a>
            </div>
        </div>

        <!-- Card Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 justify-center mx-auto">
            @foreach ($classes as $class)
            <div class="bg-white rounded-lg shadow-xl overflow-hidden border border-gray-200 hover:shadow-2xl transition-shadow duration-300 transform hover:scale-105">
                <div class="p-8">
                    <h2 class="text-2xl font-semibold text-purple-700 mb-4">{{ $class->name }}</h2>
                    <p class="text-lg text-gray-600 mb-4"><strong>Coach:</strong> {{ $class->coach->name }}</p>
                    <p class="text-lg text-gray-600 mb-4"><strong>Seats:</strong> {{ $class->seats }}</p>
                    <p class="text-lg text-gray-600 mb-4"><strong>Description:</strong> {{ Str::limit($class->description, 150) }}</p>

                    <button onclick="openModal({{ $class->id }})" class="bg-purple-600 text-white py-3 px-6 rounded-lg hover:bg-purple-700 transition duration-200 text-lg">
                        View
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal -->
<div id="classModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white w-full max-w-lg p-8 rounded-lg shadow-lg relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <h2 class="text-3xl font-semibold text-purple-700 mb-6 text-center" id="modalTitle">Class Details</h2>

        <div id="modalContent" class="space-y-4"></div>

        <div class="mt-6 text-center">
            <a href="#" id="createCourseButton" class="bg-green-600 text-white py-3 px-8 rounded-lg hover:bg-green-700 transition duration-200">
                Create Course for this Class
            </a>
        </div>
    </div>
</div>

<script>
    function openModal(classId) {
        const modal = document.getElementById('classModal');
        const modalContent = document.getElementById('modalContent');
        const modalTitle = document.getElementById('modalTitle');
        const createCourseButton = document.getElementById('createCourseButton');

        @foreach ($classes as $class)
            if (classId === {{ $class->id }}) {
                modalTitle.innerHTML = '{{ $class->name }}';
                modalContent.innerHTML = `
                    <p><strong>Coach:</strong> {{ $class->coach->name }}</p>
                    <p><strong>Seats Available:</strong> {{ $class->seats }}</p>
                    <p><strong>Description:</strong> {{ $class->description }}</p>
                `;

                createCourseButton.href = '/classes/' + classId + '/courses';
            }
        @endforeach

        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('classModal');
        modal.classList.add('hidden');
    }
</script>
@endsection

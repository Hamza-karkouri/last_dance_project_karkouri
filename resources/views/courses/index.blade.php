@extends('dashboard')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center px-4 py-8 sm:px-6 lg:px-8 bg-gray-100">
    <!-- Heading Section -->
    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6 border border-gray-200">
        <h1 class="text-3xl font-semibold text-purple-700 text-center mb-6">Courses for: {{ $class->name }}</h1>
        <div class="text-center mt-4">
            <a href="{{ route('courses.create', $class->id) }}" class="bg-purple-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-purple-700 transition duration-200">
                Create New Course
            </a>
        </div>
    </div>

    <!-- Courses Table Section -->
    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6 border border-gray-200 mt-6">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="border-b-2 border-gray-200">
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Course Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr class="border-b border-gray-200">
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $course->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">
                            <button onclick="openModal({{ $course->id }})" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                                View
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for Course Details -->
<div id="courseModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white w-full max-w-lg p-8 rounded-lg shadow-lg relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <h2 class="text-2xl font-semibold text-purple-700 mb-6 text-center" id="modalTitle">Course Details</h2>

        <div id="modalContent" class="space-y-4"></div>

        <div class="mt-6 text-center">
            <a href="#" id="createLessonButton" class="bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 transition duration-200">
                Create Lesson for this Course
            </a>
        </div>
    </div>
</div>

<script>
    function openModal(courseId) {
        const modal = document.getElementById('courseModal');
        const modalContent = document.getElementById('modalContent');
        const modalTitle = document.getElementById('modalTitle');
        const createLessonButton = document.getElementById('createLessonButton');

        @foreach ($courses as $course)
            if (courseId === {{ $course->id }}) {
                modalTitle.innerHTML = '{{ $course->name }}';
                modalContent.innerHTML = `
                    <p><strong>Description:</strong> {{ $course->description }}</p>
                    <p><strong>Created At:</strong> {{ $course->created_at->format('F j, Y') }}</p>
                `;

                createLessonButton.href = '/courses/' + courseId + '/lessons';
            }
        @endforeach

        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('courseModal');
        modal.classList.add('hidden');
    }
</script>
@endsection

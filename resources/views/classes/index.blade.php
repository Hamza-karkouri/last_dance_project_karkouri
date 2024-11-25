@extends('dashboard')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center px-4 py-8 sm:px-6 lg:px-8 bg-gray-100">
    <div class="mb-6 w-full max-w-4xl">
        <h1 class="text-3xl font-semibold text-purple-700 text-center">Classes</h1>
        <div class="text-center mt-4">
            <a href="{{ route('classes.create') }}" class="bg-purple-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-purple-700 transition duration-200">
                Create New Class
            </a>
        </div>
    </div>

    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6 border border-gray-200">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="border-b-2 border-gray-200">
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Coach</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Seats</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                    <tr class="border-b border-gray-200">
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $class->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $class->coach->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $class->seats }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">
                            <button onclick="openModal({{ $class->id }})" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                                View
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="classModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white w-full max-w-lg p-8 rounded-lg shadow-lg relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <h2 class="text-2xl font-semibold text-purple-700 mb-6 text-center" id="modalTitle">Class Details</h2>

        <div id="modalContent" class="space-y-4"></div>

        <div class="mt-6 text-center">
            <a href="#" id="createCourseButton" class="bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 transition duration-200">
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

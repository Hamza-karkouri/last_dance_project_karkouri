@extends('dashboard')

@section('content')
<div class="container">
    <h1>Lessons for Course: {{ $course->name }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('lessons.create', $course->id) }}" class="btn btn-primary">Add New Lesson</a>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->name }}</td>
                    <td>{{ $lesson->order }}</td>
                    <td>
                        <a href="{{ route('courses.lessons.edit', [$course->id, $lesson->id]) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('courses.lessons.destroy', [$course->id, $lesson->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this lesson?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

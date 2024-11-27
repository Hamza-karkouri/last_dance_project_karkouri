@extends('dashboard')

@section('content')
<div class="container">
    <h1>Edit Lesson: {{ $lesson->name }}</h1>

    <form action="{{ route('courses.lessons.update', [$course->id, $lesson->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Lesson Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $lesson->name }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="4">{{ $lesson->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="order" class="form-label">Order</label>
            <input type="number" class="form-control" id="order" name="order" value="{{ $lesson->order }}" required>
        </div>

        <div class="mb-3">
            <label for="video" class="form-label">Video</label>
            <input type="file" class="form-control" id="video" name="video">
            @if ($lesson->video)
                <p>Current video: {{ basename($lesson->video) }}</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Lesson</button>
        <a href="{{ route('courses.lessons.index', $course->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

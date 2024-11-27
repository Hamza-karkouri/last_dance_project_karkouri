@extends('dashboard')

@section('content')
<div class="container">
    <h1>Create a New Lesson for: {{ $course->name }}</h1>

    <form action="{{ route('lessons.store', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Lesson Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label for="order" class="form-label">Order</label>
            <input type="number" class="form-control" id="order" name="order" required>
        </div>

        <div class="mb-3">
            <label for="video" class="form-label">Video</label>
            <input type="file" class="form-control" id="video" name="video" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Lesson</button>
        <a href="{{ route('lessons.index', $course->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

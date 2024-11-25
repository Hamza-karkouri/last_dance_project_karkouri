<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    // Display a list of lessons for a specific course
    public function index($courseId)
    {
        $course = Course::findOrFail($courseId);
        $lessons = $course->lessons; // Get lessons associated with the course

        return view('lessons.index', compact('course', 'lessons'));
    }

    // Show the form for creating a new lesson
    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);

        return view('lessons.create', compact('course'));
    }

    // Store a new lesson in the database
    public function store(Request $request, $courseId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'order' => 'required|integer',
        ]);

        $course = Course::findOrFail($courseId);
        $lesson = new Lesson($request->all());
        $course->lessons()->save($lesson);

        return redirect()->route('lessons.index', $courseId)->with('success', 'Lesson created successfully!');
    }

    // Show the form for editing an existing lesson
    public function edit($lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);

        return view('lessons.edit', compact('lesson'));
    }

    // Update the lesson in the database
    public function update(Request $request, $lessonId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'order' => 'required|integer',
        ]);

        $lesson = Lesson::findOrFail($lessonId);
        $lesson->update($request->all());

        return redirect()->route('lessons.index', $lesson->course_id)->with('success', 'Lesson updated successfully!');
    }

    // Delete a lesson from the database
    public function destroy($lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $lesson->delete();

        return redirect()->route('lessons.index', $lesson->course_id)->with('success', 'Lesson deleted successfully!');
    }
}

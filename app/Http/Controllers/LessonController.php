<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Course $course)
    {
        $lessons = $course->lessons;

        return view('lessons.index', compact('course', 'lessons'));
    }

    public function create(Course $course)
    {
        return view('lessons.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'order' => 'required|integer',
            'video' => 'nullable|',
        ]);

        $lesson = new Lesson($request->all());


        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $hashedName = hash('sha256', time() . $video->getClientOriginalName()) . '.' . $video->getClientOriginalExtension();
            $videoPath = $video->storeAs('lessons/videos', $hashedName, 'public');
            $lesson->video = $videoPath;
        }

        $lesson->course_id = $course->id;

        $course->lessons()->save($lesson);

        return redirect()->route('lessons.index', $course->id)->with('success', 'Lesson created successfully!');
    }


    public function edit(Course $course, Lesson $lesson)
    {
        return view('lessons.edit', compact('course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'order' => 'required|integer',
            'video' => 'nullable|mimes:mp4,mkv,avi|max:20480',  // Same here, make video nullable
        ]);

        $lesson->update($request->all());

        return redirect()->route('lessons.index', $course->id)->with('success', 'Lesson updated successfully!');
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('lessons.index', $course->id)->with('success', 'Lesson deleted successfully!');
    }
}

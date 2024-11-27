<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Classes;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($classId)
    {
        $class = Classes::findOrFail($classId);
        $courses = $class->courses;
        return view('courses.index', compact('class', 'courses'));
    }

    public function create($classId)
    {
        $class = Classes::findOrFail($classId);
        return view('courses.create', compact('class'));
    }

    public function store(Request $request, $classId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $class = Classes::findOrFail($classId);

        $courseData = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            $courseData['image'] = md5($request->file('image')->getClientOriginalName()) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('course_images', $courseData['image'], 'public');

        }

        $class->courses()->create($courseData);

        return redirect()->route('courses.index', $classId);
    }
}

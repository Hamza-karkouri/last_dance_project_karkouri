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
        ]);

        $class = Classes::findOrFail($classId);
        $class->courses()->create($request->all());

        return redirect()->route('courses.index', $classId);
    }
}

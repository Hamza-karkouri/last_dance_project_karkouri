<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    // Show all classes
    public function index()
    {
        $classes = Classes::all();
        return view('classes.index', compact('classes'));
    }

    // Show form for creating a class
    public function create()
    {
        $coaches = User::role('coach')->get(); // Get all coaches (assuming you are using Spatie's role package)
        return view('classes.create', compact('coaches'));
    }

    // Store a new class
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'coach_id' => 'required|exists:users,id',
            'seats' => 'required|integer',

        ]);

        Classes::create($request->all());
        return redirect()->route('classes.index');
    }

    // Show class details (e.g., to add courses and lessons)
    public function show($classId)
    {
        $class = Classes::findOrFail($classId);
        return view('classes.show', compact('class'));
    }
}

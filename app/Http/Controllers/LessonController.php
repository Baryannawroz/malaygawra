<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('lessons.lesson_index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Lessons.Lesson_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {

        // Create the Lesson with validated data
        Lesson::create($request->validated());

        // Redirect back with a success message
        return redirect('lessons')->with('success', 'Lesson created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Lesson $Lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        return view('lessons.lesson_edit',compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $Lesson)
    {
        // Validate the request data (already handled by the form request)
        $validated = $request->validated();

        // Update the Lesson with validated data
        $Lesson->update($validated);

        // Redirect back with a success message
        return redirect()->route('lessons')->with('success', 'Lesson updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $Lesson)
    {
        $Lesson->delete();
        return redirect()->route('lessons')->with('success', 'Lesson deleted successfully.');

    }
}

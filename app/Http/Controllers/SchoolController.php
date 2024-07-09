<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();
        return view('school.school_index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school.school_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolRequest $request)
    {

        // Create the school with validated data
        School::create($request->validated());

        // Redirect back with a success message
        return redirect()->back()->with('success', 'School created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view(
            'school.school_edit',
            compact('school')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        // Validate the request data (already handled by the form request)
        $validated = $request->validated();

        // Update the school with validated data
        $school->update($validated);

        // Redirect back with a success message
        return redirect()->route('schools')->with('success', 'School updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();
        return redirect()->route('schools')->with('success', 'School deleted successfully.');

    }
}

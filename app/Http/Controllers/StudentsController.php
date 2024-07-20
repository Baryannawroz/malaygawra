<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use App\Models\Lesson;
use App\Models\School;
use App\Models\Street;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $students = Students::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");

            })
            ->paginate(30);

        return view('studens.studen_index', compact('students', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools=School::all();
        $streets=Street::all();
        $lessons=Lesson::all();
        return view('studens.create-student', compact('schools','streets','lessons'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'father_phone' => 'required|string|max:15',
            'mother_phone' => 'required|string|max:15',
            'school_id' => 'required|integer',
            'school_stage' => 'required|string|max:255',
            'street_id' => 'required|integer',
            'stage_id_parwarda' => 'required|integer',
            'stage_id_quran' => 'required|integer',
            'photo_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'gender' => 'required|integer',
            'marital_status' => 'required|integer',
            'birth_date' => 'required|date',
        ]);

        // Handle the photo upload
        if ($request->hasFile('photo_path')) {
            $file = $request->file('photo_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/photos', $filename);
            $photoPath = str_replace('public/', 'storage/', $path);
        }

        // Create a new student record
        $student = Students::create([
            'name' => $request->name,
            'father_phone' => $request->father_phone,
            'mother_phone' => $request->mother_phone,
            'school_id' => $request->school_id,
            'school_stage' => $request->school_stage,
            'street_id' => $request->street_id,
            'stage_id_parwarda' => $request->stage_id_parwarda,
            'stage_id_quran' => $request->stage_id_quran,
            'photo_path' => $photoPath,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'birth_date' => $request->birth_date,
        ]);

        return redirect()->route('student.create')->with('success', 'ڕیکۆردەکە بە سەرکەوتووی زیاد کرا');
}


    /**
     * Display the specified resource.
     */
    public function show(Students $student)
    {
       return view('studens.show_studen',compact('student'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $student)
    {
        $schools = School::all();
        $streets = Street::all();
        $lessons = Lesson::all();
        return view('student.edit', compact('student', 'schools', 'streets', 'lessons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'father_phone' => 'required|string|max:255',
            'mother_phone' => 'required|string|max:255',
            'school_id' => 'required|integer',
            'birth_date' => 'required|date',
            'street_id' => 'required|integer',
            'school_stage' => 'required|string|max:255',
            'stage_id_parwarda' => 'required|integer',
            'stage_id_quran' => 'required|integer',
            'photo_path' => 'nullable|image|max:2048',
            'gender' => 'required|integer',
            'marital_status' => 'required|integer',
        ]);

        $student = Students::findOrFail($id);
        $student->update($request->all());

        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('photos', 'public');
            $student->update(['photo_path' => $path]);
        }

        return redirect()->route('student.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Lesson;
use App\Models\School;
use App\Models\Street;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
       public function index(Request $request)
    {
        $search = $request->input('search');
        $teachers = Teacher::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(30);
        $dayOfWeek = Carbon::today()->dayOfWeek;
        return view('teachers.index-teacher', compact('teachers', 'search', 'dayOfWeek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $streets = Street::all();

        return view('teachers.create-teacher', compact('streets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'street_id' => 'required|integer',
            'gender' => 'required|string|max:10',
            'marital_status' => 'required|string|max:10',
            'birth_date' => 'required|date',
        ]);

        // Handle the photo upload
        if ($request->hasFile('photo_path')) {
            $file = $request->file('photo_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/photos', $filename);
            $photoPath = str_replace('public/', 'storage/', $path);
        }

        // Create a new teacher record
        $teacher = Teacher::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'street_id' => $request->street_id,
            'photo_path' => $photoPath,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'birth_date' => $request->birth_date,
        ]);

        return redirect()->route('teachers')->with('success', 'مامۆستاکە بە سەرکەوتووی زیاد کرا');
    }


    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show-teacher', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}

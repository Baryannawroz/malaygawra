<?php

namespace App\Http\Controllers;

use App\Models\TeacherAbsent;
use App\Http\Requests\StoreTeacherAbsentRequest;
use App\Http\Requests\UpdateTeacherAbsentRequest;
use Illuminate\Http\Request;

class TeacherAbsentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'teachers.*.id' => 'required|exists:students,id',
            'teachers.*.isAbsent' => 'required',
        ]);
        foreach ($data['teachers'] as $teacher) {

            $absent = new TeacherAbsent();
            $absent->date = $request['date'];
            $absent->teacher_id = $teacher['id'];
            $absent->isAbsent = $teacher['isAbsent'];
            $absent->save();
        }

        return redirect()->back()->with('success', 'غیاباتەکە بەسەرکەوتوی  وەرگیرا');
    }


    /**
     * Display the specified resource.
     */
    public function show(TeacherAbsent $teacherAbsent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherAbsent $teacherAbsent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherAbsentRequest $request, TeacherAbsent $teacherAbsent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherAbsent $teacherAbsent)
    {
        //
    }
}

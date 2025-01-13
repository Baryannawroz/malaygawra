<?php

namespace App\Http\Controllers;

use App\Models\AdministratorAbsent;
use App\Http\Requests\StoreadministratorAbsentControllerRequest;
use App\Http\Requests\UpdateadministratorAbsentControllerRequest;
use App\Models\administratorAbsentController as ModelsAdministratorAbsentController;
use Illuminate\Http\Request;

class AdministratorAbsentController extends Controller
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

            $absent = new AdministratorAbsent();
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

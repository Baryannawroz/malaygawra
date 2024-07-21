<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Http\Requests\StoreAbsenceRequest;
use App\Http\Requests\UpdateAbsenceRequest;
use App\Models\AbsentRecord;
use App\Models\Group;
use App\Models\GroupStudent;
use App\Models\Students;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($groupId)
    {
   $absences=Absence::where('group_id',$groupId)->latest()->get();
   $group=Group::find($groupId);
   return view('absents.index-absent',compact('absences','group'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($groupId)
    {
        $student_ids = GroupStudent::where('group_id', $groupId)->pluck('student_id');
        $students = Students::whereIn('id', $student_ids)->get();
        $group = Group::find($groupId); // Fetch the group details

        return view('absents.create-absent', compact('students', 'group'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbsenceRequest $request)
    {

        $data = $request->validate([
            'students.*.id' => 'required|exists:students,id',
            'students.*.isAbsent' => 'required',
        ]);

        $absent = new Absence();
        $absent->group_id = $request['group_id'];
        $absent->date = $request['date'];
        $absent->save();
        $absent->addAbsent($absent->id,$data['students']);
        return redirect()->back()->with('success', 'Attendance recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absence $absence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsenceRequest $request, Absence $absence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absence $absence)
    {
        //
    }
}

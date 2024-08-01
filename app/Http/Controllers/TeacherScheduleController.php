<?php

namespace App\Http\Controllers;

use App\Models\teacherSchedule;
use App\Http\Requests\StoreteacherScheduleRequest;
use App\Http\Requests\UpdateteacherScheduleRequest;
use App\Models\Teacher;

class TeacherScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        $schedules = TeacherSchedule::with('teacher')->get();
        return view('teacher-schedules.index-teacher', compact('schedules','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($day_of_week)
    {
        dd($day_of_week);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreteacherScheduleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(teacherSchedule $teacherSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(teacherSchedule $teacherSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateteacherScheduleRequest $request, teacherSchedule $teacherSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(teacherSchedule $teacherSchedule)
    {
        //
    }
}

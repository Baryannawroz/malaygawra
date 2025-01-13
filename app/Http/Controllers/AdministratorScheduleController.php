<?php

namespace App\Http\Controllers;

use App\Models\administratorSchedule;
use App\Http\Requests\StoreadministratorScheduleControllerRequest;
use App\Http\Requests\UpdateadministratorScheduleControllerRequest;
use App\Models\AdministratorSchedule as ModelsAdministratorSchedule;
use App\Models\Teacher;

class AdministratorScheduleController extends Controller
{

    public function index()
    {
        $teachers = Teacher::all();
        $schedules = AdministratorSchedule::with('teacher')->get();
        return view('teacher-schedules.index-administrator', compact('schedules', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('teacher-schedules.create-abcent-administrator');
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

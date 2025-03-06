<?php

namespace App\Http\Controllers;

use App\Models\AbsentRecord;
use App\Models\School;
use App\Models\Students;
use App\Models\Teacher;
use App\Models\TeacherAbsent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools=School::all();
        return view('reports.reports-home',compact('schools'));
    }
    public function teacherAbsence(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        $absents = TeacherAbsent::where(function ($query) use ($from, $to) {
            if ($from) {
                $query->whereDate('date', '>=', $from);
            }
            if ($to) {
                $query->whereDate('date', '<=', $to);
            }
        })
            ->select(
                'teacher_id',
                DB::raw('SUM(CASE WHEN isAbsent = 0 THEN 1 ELSE 0 END) AS present_count'),
                DB::raw('SUM(CASE WHEN isAbsent = 1 THEN 1 ELSE 0 END) AS absent_count'),
                DB::raw('SUM(CASE WHEN isAbsent = 2 THEN 1 ELSE 0 END) AS permission_count')
            )
            ->groupBy('teacher_id')
            ->get();

        return view('reports.report-teacher-absence',compact('from','to'));
    }
    public function studentAbsence(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        $absents = AbsentRecord::where(function ($query) use ($from, $to) {
            if ($from) {
                $query->whereDate('created_at', '>=', $from);
            }
            if ($to) {
                $query->whereDate('created_at', '<=', $to);
            }
        })
            ->select(
                'student_id',
                DB::raw('SUM(CASE WHEN isAbsent = 0 THEN 1 ELSE 0 END) AS present_count'),
                DB::raw('SUM(CASE WHEN isAbsent = 1 THEN 1 ELSE 0 END) AS absent_count'),
                DB::raw('SUM(CASE WHEN isAbsent = 2 THEN 1 ELSE 0 END) AS permission_count')
            )
            ->groupBy('student_id')
            ->get();

        return view('reports.report-student-absence',compact('from','to', 'absents'));
    }
    public function studentInfo(Request $request ){

        $from = $request->input('from');
        $to = $request->input('to');
        $isMale= $request->input('isMale');
        $school_id=$request->input('school_id');
        $students = Students::query()
            ->with('school');
        if ($from) {
            $students->whereDate('birth_date', '>=', $from);
        }
        if ($to) {
            $students->whereDate('birth_date', '<=', $to);
        }
        if (!is_null($isMale)) {
            $students->where('gender', $isMale);
        }
        if ($school_id) {
            $students->where('school_id', $school_id);
        }

        $students = $students->paginate(50);;
        $schools=School::all();
        return view('reports.report-student-info', compact('from', 'to', 'isMale','students','schools'));

    }
    public function teacherInfo(Request $request ){

        $from = $request->input('from');
        $to = $request->input('to');
        $isMale= $request->input('isMale');
        $teachers = Teacher::query();
        if ($from) {
            $teachers->whereDate('birth_date', '>=', $from);
        }
        if ($to) {
            $teachers->whereDate('birth_date', '<=', $to);
        }
        if (!is_null($isMale)) {
            $teachers->where('gender', $isMale);
        }


        $teachers = $teachers->paginate(50);;
        return view('reports.report-teacher-info', compact('from', 'to', 'isMale','teachers'));

    }



    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

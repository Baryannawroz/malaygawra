<?php

namespace App\Http\Controllers;

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
        return view('reports.reports-home');
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

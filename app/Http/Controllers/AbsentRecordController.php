<?php

namespace App\Http\Controllers;

use App\Models\AbsentRecord;
use App\Http\Requests\StoreAbsentRecordRequest;
use App\Http\Requests\UpdateAbsentRecordRequest;
use App\Models\Absence;
use App\Models\Group;
use Illuminate\Http\Request;

class AbsentRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( $id)
    {
        $absence=Absence::find($id);
        $group=Group::find($absence->group_id);
        $absences=AbsentRecord::where('absence_id',$id)->get();
return view('absentRecords.index-absenceRecord',compact('absence','group','absences'));
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
    public function store(StoreAbsentRecordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsentRecord $absentRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsentRecord $absentRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsentRecordRequest $request, AbsentRecord $absentRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsentRecord $absentRecord)
    {
        //
    }
}

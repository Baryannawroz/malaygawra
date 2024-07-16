<?php

namespace App\Http\Controllers;

use App\Models\GroupStudent;
use App\Http\Requests\StoreGroupStudentRequest;
use App\Http\Requests\UpdateGroupStudentRequest;
use App\Models\Group;
use App\Models\Students;

class GroupStudentController extends Controller
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
    public function store(StoreGroupStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $group_id)
    {
        $group = Group::find($group_id);
        $groupStudents = GroupStudent::where($group_id,'group_id');
        $students=Students::all();
        return view('groupStudents.show-group-student',compact('group','groupStudents','students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GroupStudent $groupStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupStudentRequest $request, GroupStudent $groupStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupStudent $groupStudent)
    {
        //
    }
}

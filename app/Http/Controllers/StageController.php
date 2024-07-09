<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Http\Requests\StoreStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Models\Lesson;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stages = Stage::with('lesson')->get();
        return view('stages.stage_index',compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lessons=Lesson::all();
        return view('stages.stage_create',compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStageRequest $request)
    {
        Stage::create($request->all());
        return  redirect()->route('stages');

    }

    /**
     * Display the specified resource.
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stage $stage)
    {
        $lessons = Lesson::all();
        return view('stages.stage_edit',compact('stage','lessons'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStageRequest $request, Stage $stage)
    {
        $stage->update($request->all());
        return  redirect()->route('stages');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stage $stage)
    {
        $stage->delete();
        return  redirect()->route('stages');
    }
}

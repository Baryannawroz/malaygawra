<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Teacher;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $groups = Group::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(30);
        return view('groups.group_index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers=Teacher::all();
        return view('groups.group_create',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'required',
        ]);

        Group::create($request->all());

        return redirect()->route('groups')->with('success', 'بە سەرکەوتی دەرسەکە زیاد کرا');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $teachers=Teacher::all();
        return view('groups.group_edit', compact('group','teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'required',
        ]);

        $group->update($request->all());

        return redirect()->route('groups')->with('success', 'گۆرانکاریەکە ئەنجام درا');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups')->with('success', 'Group deleted successfully.');
    }
}

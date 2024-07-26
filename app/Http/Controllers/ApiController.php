<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Students;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function searchStudent(Request $request)
    {
        $search = $request->input('search');

        $students = Students::where('name', 'LIKE', "%{$search}%")
            ->limit(10)
            ->get()
            ->map(function ($student) {
                return [
                    'id' => $student->id,
                    'text' => $student->name,
                ];
            });

        return response()->json($students);
    }
    public function searchTeacher(Request $request)
    {
        $search = $request->input('search');

        $teachers = Teacher::where('name', 'LIKE', "%{$search}%")
            ->limit(10)
            ->get()
            ->map(function ($teacher) {
                return [
                    'id' => $teacher->id,
                    'text' => $teacher->name,
                ];
            });

        return response()->json($teachers);
    }
    public function searchGroup(Request $request)
    {
        $search = $request->input('search');

        $groups = Group::where('name', 'LIKE', "%{$search}%")
            ->limit(10)
            ->get()
            ->map(function ($group) {
                return [
                    'id' => $group->id,
                    'text' => $group->name,
                ];
            });

        return response()->json($groups);
    }
}

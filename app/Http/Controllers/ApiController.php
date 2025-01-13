<?php

namespace App\Http\Controllers;

use App\Models\AdministratorSchedule;
use App\Models\Group;
use App\Models\Students;
use App\Models\Teacher;
use App\Models\teacherSchedule;
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
    public function addTeacherSchedule(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'day_of_week' => 'required|string'
        ]);

        teacherSchedule::create($request->only('teacher_id', 'day_of_week'));
        $teacher = Teacher::find($request['teacher_id']);
        return response()->json(['name' => $teacher['name'], 'id' => $teacher['id']]);
    }
    public function addAdministratorSchedule(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'day_of_week' => 'required|string'
        ]);

        AdministratorSchedule::create($request->only('teacher_id', 'day_of_week'));
        $teacher = Teacher::find($request['teacher_id']);
        return response()->json(['name' => $teacher['name'], 'id' => $teacher['id']]);
    }
    public function destroyTeacherSchedule($id)
    {
        // Find the teacher schedule by id
        $schedule = teacherSchedule::find($id);

        // Check if the schedule exists
        if ($schedule) {
            // Delete the schedule
            $schedule->delete();

            // Return success response
            return response()->json(['message' => 'ڕیکۆردەکە بەسەرکەوتووی سڕایەوە']);
        } else {
            // Return error response if not found
            return response()->json(['message' => 'ڕیکۆردەکە نەدۆزرایەوە'], 404);
        }
    }
    public function destroyAdministratorSchedule($id)
    {
        // Find the teacher schedule by id
        $schedule = AdministratorSchedule::find($id);

        // Check if the schedule exists
        if ($schedule) {
            // Delete the schedule
            $schedule->delete();

            // Return success response
            return response()->json(['message' => 'ڕیکۆردەکە بەسەرکەوتووی سڕایەوە']);
        } else {
            // Return error response if not found
            return response()->json(['message' => 'ڕیکۆردەکە نەدۆزرایەوە'], 404);
        }
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

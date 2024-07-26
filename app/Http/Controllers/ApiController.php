<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function searchStudents(Request $request)
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
}



<?php

namespace App\Http\Controllers\Api;

use App\Rules\DigitRule;
use App\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //
    public function index()
    {

        $student = Student::all();
        if ($student->count() > 0) {
            $data = [
                'status' => 200,
                'student' => $student
            ];
            return response()->json($data, 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }
    public function store(Request $request)
    {
        // $student = new Student;
        // $validator = Validator();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'course' => 'required|string|max:191',
            'email' => 'required|email|max:191|',
            'phone' => 'required|digits:10'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student = Student::create([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
        }
        if ($student) {

            return response()->json([
                'status' => 200,
                'message' => 'Student Created Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Error Creating Student'
            ], 500);
        }
    }

    public function show($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'message' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Student record not found'
            ], 404);
        }
    }
}

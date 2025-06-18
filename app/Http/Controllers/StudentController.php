<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Dotenv\Repository\RepositoryInterface;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $students = Student::query();
            return DataTables::of($students)->make(true);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string',
            'class' => 'required|string',
            'section' => 'required|string',
        ]);

        Student::create($request->all());
        return response()->json(['message' => 'Student created successfully']);
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email,' . $student->id . ',id',
            'phone' => 'nullable|string',
            'class' => 'required|string',
            'section' => 'required|string',
        ]);

        $student->update($request->all());

        return response()->json(['message' => 'Student updated successfully']);
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully']);
    }

    public  function toggleStatus($id)
    {
        $student = Student::findOrFail($id);
        $student->status = !$student->status;
        $student->save();
        return response()->json(['message' => 'Status Updated']);
    }
}

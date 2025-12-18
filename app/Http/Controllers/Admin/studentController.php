<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('Admin.Student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $input = $request->validate([
        'stNo'     => ['required', 'unique:students,stNo'],
        'name'     => ['required'],
        'email'    => [
            'required',
            'email',
            'unique:students,email',
            'regex:/^[A-Za-z0-9._%+-]+@limu\.edu\.ly$/'
        ],
        'password' => ['required'],
        'avg'      => ['nullable', 'numeric'],
        'status'   => ['required', 'in:active,notActive,dismissed'],
    ]);

    $input['password'] = Hash::make($input['password']);

    Student::create($input);

    return redirect()->route('student.index')->with('success', 'Student is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('Admin.Student.details', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
         return view('Admin.Student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $input = $request->validate([
        'stNo'     => ['required', 'unique:students,stNo,'],
        'name'     => ['required'],
        'email'    => [
            'required',
            'email',
            'unique:students,email,',
            'regex:/^[A-Za-z0-9._%+-]+@limu\.edu\.ly$/'
        ],
        'password' => ['nullable'],
        'avg'      => ['nullable', 'numeric'],
        'status'   => ['required', 'in:active,notActive,dismissed'],
    ]);

    if (!empty($input['password'])) {
        $input['password'] = Hash::make($input['password']);
    } else {
        unset($input['password']);
    }

    $student->update($input);

    return redirect()->route('student.index')->with('success', 'Student is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student is deleted successfully');
    }
}

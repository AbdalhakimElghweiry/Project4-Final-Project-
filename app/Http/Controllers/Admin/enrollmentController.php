<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Professor;
use App\Models\Student;
use Illuminate\Http\Request;

class enrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::with(['professor','course','student'])->get();
        return view('Admin.Enrollment.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students=Student::all();
        $courses=Course::all();
        $professors=Professor::all();
        return view('Admin.Enrollment.create',compact(['courses','professors','students']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'studentId'   => ['required', 'exists:students,id'],
            'courseId'    => ['required', 'exists:courses,id'],
            'professorId' => ['required', 'exists:professors,id'],
            'mark'        => ['nullable', 'numeric', 'between:0,100'],
        ]);

        Enrollment::create($input);

        return redirect()->route('enrollment.index')
                         ->with('success', 'Enrollment added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
       return view('Admin.Enrollment.details',compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        $students=Student::all();
        $courses=Course::all();
        $professors=Professor::all();
        return view('Admin.Enrollment.edit',compact(['enrollment','courses','professors','students']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
          $input = $request->validate([
            'studentId'   => ['required', 'exists:students,id'],
            'courseId'    => ['required', 'exists:courses,id'],
            'professorId' => ['required', 'exists:professors,id'],
            'mark'        => ['nullable', 'numeric', 'between:0,100'],
        ]);

        $enrollment->update($input);

        return redirect()->route('enrollment.index')
                         ->with('success', 'Enrollment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollment.index')->with('success', 'Enrollment is deleted successfully');
    }
}

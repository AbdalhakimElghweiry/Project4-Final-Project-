<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EnrollmentService;
use App\DTOs\EnrollmentDTO;
use App\Models\Student;
use App\Models\Course;

class EnrollmentController extends Controller
{
    protected EnrollmentService $service;

    public function __construct(EnrollmentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $enrollments = $this->service->all();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        $professors = \App\Models\Professor::all();
        return view('enrollments.create', compact('students', 'courses', 'professors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'studentId' => 'required|exists:students,id',
            'courseId' => 'required|exists:courses,id',
            'professorId' => 'required|exists:professors,id',
            'mark' => 'nullable|numeric|min:0|max:100',
        ]);

        $dto = EnrollmentDTO::fromArray($data);
        $this->service->create($dto);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created.');
    }

    public function edit($id)
    {
        $enrollment = $this->service->find($id);
        $students = Student::all();
        $courses = Course::all();
        $professors = \App\Models\Professor::all();
        return view('enrollments.edit', compact('enrollment', 'students', 'courses', 'professors'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'studentId' => 'required|exists:students,id',
            'courseId' => 'required|exists:courses,id',
            'professorId' => 'required|exists:professors,id',
            'mark' => 'nullable|numeric|min:0|max:100',
        ]);

        $dto = EnrollmentDTO::fromArray($data);
        $this->service->update($id, $dto);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted.');
    }
}

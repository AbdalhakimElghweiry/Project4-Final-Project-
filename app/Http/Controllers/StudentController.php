<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StudentService;
use App\DTOs\StudentDTO;
use App\Models\Department;

class StudentController extends Controller
{
    protected StudentService $service;

    public function __construct(StudentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $students = $this->service->all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('students.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'department' => 'required|string|max:255',
        ]);

        $dto = StudentDTO::fromArray($data);
        $this->service->create($dto);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit($id)
    {
        $student = $this->service->find($id);
        $departments = Department::all();
        return view('students.edit', compact('student', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'department' => 'required|string|max:255',
        ]);

        $dto = StudentDTO::fromArray($data);
        $this->service->update($id, $dto);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}

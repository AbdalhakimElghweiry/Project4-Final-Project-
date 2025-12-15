<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CourseService;
use App\DTOs\CourseDTO;

class CourseController extends Controller
{
    protected CourseService $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $courses = $this->service->all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|string|max:255|unique:courses,symbol',
        ]);

        $dto = CourseDTO::fromArray($data);
        $this->service->create($dto);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit($id)
    {
        $course = $this->service->find($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|string|max:255|unique:courses,symbol,' . $id,
        ]);

        $dto = CourseDTO::fromArray($data);
        $this->service->update($id, $dto);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}

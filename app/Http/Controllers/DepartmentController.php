<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DepartmentService;
use App\DTOs\DepartmentDTO;

class DepartmentController extends Controller
{
    protected DepartmentService $service;

    public function __construct(DepartmentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $departments = $this->service->all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name',
            'symbol' => 'required|string|max:10',
        ]);

        $dto = DepartmentDTO::fromArray($data);
        $this->service->create($dto);

        return redirect()->route('department.index')->with('success', 'Department created successfully.');
    }

    public function show($id)
    {
        $department = $this->service->find($id);
        return view('departments.show', compact('department'));
    }

    public function edit($id)
    {
        $department = $this->service->find($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $id,
            'symbol' => 'required|string|max:10',
        ]);

        $dto = DepartmentDTO::fromArray($data);
        $this->service->update($id, $dto);

        return redirect()->route('department.index')->with('success', 'Department updated successfully.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
    }
}
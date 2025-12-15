<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfessorService;
use App\DTOs\ProfessorDTO;
use App\Models\Department;

class ProfessorController extends Controller
{
    protected ProfessorService $service;

    public function __construct(ProfessorService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $professors = $this->service->all();
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('professors.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:professors,email',
            'password' => 'nullable|string|min:6',
            'depId' => 'required|exists:departments,id',
        ]);

        $dto = ProfessorDTO::fromArray($data);
        $this->service->create($dto);

        return redirect()->route('professors.index')->with('success', 'Professor created.');
    }

    public function edit($id)
    {
        $professor = $this->service->find($id);
        $departments = Department::all();
        return view('professors.edit', compact('professor', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:professors,email,' . $id,
            'password' => 'nullable|string|min:6',
            'depId' => 'required|exists:departments,id',
        ]);

        $dto = ProfessorDTO::fromArray($data);
        $this->service->update($id, $dto);

        return redirect()->route('professors.index')->with('success', 'Professor updated.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('professors.index')->with('success', 'Professor deleted.');
    }
}

<?php

namespace App\Services;

use App\Models\Department;
use App\DTOs\DepartmentDTO;

class DepartmentService
{
    public function all()
    {
        return Department::all();
    }

    public function find($id)
    {
        return Department::findOrFail($id);
    }

    public function create(DepartmentDTO $dto)
    {
        return Department::create($dto->toArray());
    }

    public function update($id, DepartmentDTO $dto)
    {
        $department = $this->find($id);
        $department->update($dto->toArray());
        return $department;
    }

    public function delete($id)
    {
        $department = $this->find($id);
        return $department->delete();
    }
}
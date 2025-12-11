<?php

namespace App\Services;

use App\Models\Student;
use App\DTOs\StudentDTO;

class StudentService
{
    public function all()
    {
        return Student::all();
    }

    public function find($id)
    {
        return Student::findOrFail($id);
    }

    public function create(StudentDTO $dto)
    {
        // generate a simple stNo if not provided
        $data = $dto->toArray();
        if (!isset($data['stNo'])) {
            $data['stNo'] = 'S' . time();
        }
        return Student::create($data);
    }

    public function update($id, StudentDTO $dto)
    {
        $student = $this->find($id);
        $student->update($dto->toArray());
        return $student;
    }

    public function delete($id)
    {
        $student = $this->find($id);
        return $student->delete();
    }
}

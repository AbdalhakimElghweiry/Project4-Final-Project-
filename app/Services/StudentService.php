<?php

namespace App\Services;

use App\Models\Student;
use App\DTOs\StudentDTO;
use Illuminate\Support\Facades\Hash;

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
        $data = $dto->toArray();

        // generate a simple stNo if not provided
        if (empty($data['stNo'])) {
            $data['stNo'] = 'S' . time();
        }

        // set defaults
        if (!isset($data['avg']) || $data['avg'] === null) {
            $data['avg'] = 0.0;
        }
        if (empty($data['status'])) {
            $data['status'] = 'active';
        }

        // hash password if provided
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            // set a random password if none provided (not ideal, but avoids null)
            $data['password'] = Hash::make(bin2hex(random_bytes(6)));
        }

        return Student::create($data);
    }

    public function update($id, StudentDTO $dto)
    {
        $student = $this->find($id);
        $data = $dto->toArray();

        // prevent overwriting password with null; hash if provided
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $student->update($data);
        return $student;
    }

    public function delete($id)
    {
        $student = $this->find($id);
        return $student->delete();
    }
}

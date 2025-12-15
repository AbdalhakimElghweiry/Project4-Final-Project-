<?php

namespace App\Services;

use App\Models\Enrollment;
use App\DTOs\EnrollmentDTO;

class EnrollmentService
{
    public function all()
    {
        return Enrollment::with(['student', 'course'])->get();
    }

    public function find($id)
    {
        return Enrollment::findOrFail($id);
    }

    public function create(EnrollmentDTO $dto)
    {
        return Enrollment::create($dto->toArray());
    }

    public function update($id, EnrollmentDTO $dto)
    {
        $en = $this->find($id);
        $en->update($dto->toArray());
        return $en;
    }

    public function delete($id)
    {
        $en = $this->find($id);
        return $en->delete();
    }
}

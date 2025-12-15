<?php

namespace App\Services;

use App\Models\Course;
use App\DTOs\CourseDTO;

class CourseService
{
    public function all()
    {
        return Course::all();
    }

    public function find($id)
    {
        return Course::findOrFail($id);
    }

    public function create(CourseDTO $dto)
    {
        return Course::create($dto->toArray());
    }

    public function update($id, CourseDTO $dto)
    {
        $course = $this->find($id);
        $course->update($dto->toArray());
        return $course;
    }

    public function delete($id)
    {
        $course = $this->find($id);
        return $course->delete();
    }
}
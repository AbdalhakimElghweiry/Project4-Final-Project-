<?php

namespace App\DTOs;

class CourseDTO
{
    public ?string $course_name = null;
    public ?string $course_code = null;

    public static function fromArray(array $data): self
    {
        $dto = new self();
        $dto->course_name = $data['course_name'] ?? null;
        $dto->course_code = $data['course_code'] ?? null;
        return $dto;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->course_name,
            'symbol' => $this->course_code,
            'unit' => 3, // default unit
        ];
    }
}
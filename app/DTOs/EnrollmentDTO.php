<?php

namespace App\DTOs;

class EnrollmentDTO
{
    public ?int $studentId = null;
    public ?int $courseId = null;
    public $mark = null; // grade, optional
    public ?int $professorId = null;

    public static function fromArray(array $data): self
    {
        $dto = new self();
        $dto->studentId = isset($data['studentId']) ? (int)$data['studentId'] : null;
        $dto->courseId = isset($data['courseId']) ? (int)$data['courseId'] : null;
        $dto->mark = $data['mark'] ?? null;
        $dto->professorId = isset($data['professorId']) ? (int)$data['professorId'] : null;
        return $dto;
    }

    public function toArray(): array
    {
        return [
            'studentId' => $this->studentId,
            'courseId' => $this->courseId,
            'mark' => $this->mark,
            'professorId' => $this->professorId,
        ];
    }
}

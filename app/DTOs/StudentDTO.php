<?php

namespace App\DTOs;

class StudentDTO
{
    public ?string $name = null;
    public ?string $email = null;
    public ?string $department = null;

    public static function fromArray(array $data): self
    {
        $dto = new self();
        $dto->name = $data['name'] ?? null;
        $dto->email = $data['email'] ?? null;
        $dto->department = $data['department'] ?? null;
        return $dto;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'department' => $this->department,
        ];
    }
}

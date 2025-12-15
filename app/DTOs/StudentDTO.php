<?php

namespace App\DTOs;

class StudentDTO
{
    public ?string $stNo = null;
    public ?string $name = null;
    public ?string $email = null;
    public ?string $password = null;
    public ?float $avg = null;
    public ?string $status = null;

    public static function fromArray(array $data): self
    {
        $dto = new self();
        $dto->stNo = $data['stNo'] ?? $data['stno'] ?? null;
        $dto->name = $data['name'] ?? null;
        $dto->email = $data['email'] ?? null;
        $dto->password = $data['password'] ?? null;
        $dto->avg = isset($data['avg']) ? (float)$data['avg'] : null;
        $dto->status = $data['status'] ?? null;
        return $dto;
    }

    public function toArray(): array
    {
        return [
            'stNo' => $this->stNo,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'avg' => $this->avg,
            'status' => $this->status,
        ];
    }
}

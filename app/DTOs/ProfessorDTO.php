<?php

namespace App\DTOs;

class ProfessorDTO
{
    public ?string $name = null;
    // we'll use department id (depId) to match existing schema
    public ?int $depId = null;
    public ?string $email = null;
    public ?string $password = null;

    public static function fromArray(array $data): self
    {
        $dto = new self();
        $dto->name = $data['name'] ?? null;
        $dto->depId = isset($data['depId']) ? (int)$data['depId'] : ($data['depId'] ?? null);
        $dto->email = $data['email'] ?? null;
        $dto->password = $data['password'] ?? null;
        return $dto;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'depId' => $this->depId,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}

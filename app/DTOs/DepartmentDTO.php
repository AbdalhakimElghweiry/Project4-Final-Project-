<?php

namespace App\DTOs;

class DepartmentDTO
{
    public ?string $name = null;
    public ?string $symbol = null;

    public static function fromArray(array $data): self
    {
        $dto = new self();
        $dto->name = $data['name'] ?? null;
        $dto->symbol = $data['symbol'] ?? null;
        return $dto;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'symbol' => $this->symbol,
        ];
    }
}
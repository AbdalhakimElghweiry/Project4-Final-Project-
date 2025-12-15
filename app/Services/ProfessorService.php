<?php

namespace App\Services;

use App\Models\Professor;
use App\DTOs\ProfessorDTO;

class ProfessorService
{
    public function all()
    {
        return Professor::with('department')->get();
    }

    public function find($id)
    {
        return Professor::findOrFail($id);
    }

    public function create(ProfessorDTO $dto)
    {
        return Professor::create($dto->toArray());
    }

    public function update($id, ProfessorDTO $dto)
    {
        $prof = $this->find($id);
        $prof->update($dto->toArray());
        return $prof;
    }

    public function delete($id)
    {
        $prof = $this->find($id);
        return $prof->delete();
    }
}

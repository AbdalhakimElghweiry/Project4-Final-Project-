<?php

namespace App\Services;

use App\Models\Professor;
use App\DTOs\ProfessorDTO;
use Illuminate\Support\Facades\Hash;

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
        $data = $dto->toArray();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = Hash::make(bin2hex(random_bytes(6)));
        }
        return Professor::create($data);
    }

    public function update($id, ProfessorDTO $dto)
    {
        $prof = $this->find($id);
        $data = $dto->toArray();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $prof->update($data);
        return $prof;
    }

    public function delete($id)
    {
        $prof = $this->find($id);
        return $prof->delete();
    }
}

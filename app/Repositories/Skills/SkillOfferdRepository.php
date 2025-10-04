<?php

namespace App\Repositories\Skills;

use App\Models\SkillOfferd;

class SkillOfferdRepository
{
    public function all()
    {
        return SkillOfferd::latest()->get();
    }

    public function find($id)
    {
        return SkillOfferd::find($id);
    }

    public function create(array $data)
    {
        return SkillOfferd::create($data);
    }

    public function update(SkillOfferd $model, array $data)
    {
        $model->update($data);
        return $model;
    }

    public function delete(SkillOfferd $model)
    {
        return $model->delete();
    }
}
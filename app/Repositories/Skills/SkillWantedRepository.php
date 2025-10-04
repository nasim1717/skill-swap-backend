<?php

namespace App\Repositories\Skills;

use App\Models\SkillWanted;

class SkillWantedRepository
{
    public function all()
    {
        return SkillWanted::latest()->get();
    }

    public function find($id)
    {
        return SkillWanted::find($id);
    }

    public function create(array $data)
    {
        return SkillWanted::create($data);
    }

    public function update(SkillWanted $model, array $data)
    {
        $model->update($data);
        return $model;
    }

    public function delete(SkillWanted $model)
    {
        return $model->delete();
    }
}
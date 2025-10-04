<?php
namespace App\Repositories\Skills;

use App\Models\SkillOfferd;
use Illuminate\Support\Facades\Auth;

class OfferdSkillsRepository
{
    public function all()
    {
        if (Auth::check()) {
            return SkillOfferd::where('user_id', Auth::user()->id)->get();
        }
        return response()->json(['message' => 'Unauthorized Access'], 401);
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

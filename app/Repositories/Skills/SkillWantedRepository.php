<?php
namespace App\Repositories\Skills;

use App\Models\SkillWanted;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class SkillWantedRepository
{
    use ApiResponse;
    public function all()
    {
        if (Auth::check()) {
            return SkillWanted::where('user_id', Auth::user()->id)->get();
        }

        return $this->error('Unauthorized Access', 401);
    }

    public function find($id)
    {
        return SkillWanted::find($id);
    }

    public function create(array $data)
    {
        return SkillWanted::create($data);
    }

    public function update($id, array $data)
    {

        return SkillWanted::where('id', $id)->update($data);

    }

    public function delete(SkillWanted $model)
    {
        return $model->delete();
    }
}

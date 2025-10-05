<?php
namespace App\Repositories\Skills;

use App\Models\SkillOfferd;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class OfferdSkillsRepository
{
    use ApiResponse;
    public function all()
    {

        if (Auth::check()) {
            return SkillOfferd::where('user_id', Auth::user()->id)->get();
        }
        return $this->error('Unauthorized Access', 401);
    }

    public function find($id)
    {
        return SkillOfferd::find($id);
    }

    public function create(array $data)
    {
        return SkillOfferd::create($data);
    }

    public function update($id, array $data)
    {

        return SkillOfferd::where('id', $id)->update($data);

    }

    public function delete(SkillOfferd $model)
    {
        return $model->delete();
    }
}

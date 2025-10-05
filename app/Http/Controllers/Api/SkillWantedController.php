<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Skills\StoreSkillWanted;
use App\Http\Requests\Skills\UpdateeSkillWanted;
use App\Services\Skills\SkillWanteddService;
use App\Traits\ApiResponse;

class SkillWantedController extends Controller
{
    use ApiResponse;

    protected $service;

    public function __construct(SkillWanteddService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $this->success($this->service->listAll());
    }

    public function store(StoreSkillWanted $request)
    {
        $createSkillWanted = $this->service->create($request->validated());

        return $this->success($createSkillWanted, 'Skill Wanted created successfully', 201);
    }

    public function update(UpdateeSkillWanted $request, $id)
    {
        $updateSkillWanted = $this->service->update($id, $request->validated());

        return $this->success($updateSkillWanted, 'Skill Wanted updated successfully', 200);
    }
}

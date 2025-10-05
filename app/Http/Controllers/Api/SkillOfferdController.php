<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Skills\StoreSkillOfferd;
use App\Services\Skills\SkillOfferdService;
use App\Traits\ApiResponse;

class SkillOfferdController extends Controller
{
    use ApiResponse;

    protected $service;
    public function __construct(SkillOfferdService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->success($this->service->listAll());
    }

    public function store(StoreSkillOfferd $request)
    {
        $createDkillOfferd = $this->service->create($request->validated());

        return $this->success($createDkillOfferd, 'Skill Offerd created successfully', 201);

    }

    public function update(StoreSkillOfferd $request, $id)
    {
        $updateSkillOfferd = $this->service->update($id, $request->validated());

        return $this->success($updateSkillOfferd, 'Skill Offerd updated successfully', 200);

    }
}

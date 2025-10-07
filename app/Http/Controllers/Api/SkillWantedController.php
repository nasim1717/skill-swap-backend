<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Skills\StoreSkillWanted;
use App\Http\Resources\Skills\SkillWantedResouce;
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
        return $this->success(new SkillWantedResouce($this->service->listAll()), 'Skill Wanted fetched successfully', 200);
    }

    public function store(StoreSkillWanted $request)
    {
        $createSkillWanted = $this->service->create($request->validated());

        return $this->success(new SkillWantedResouce($createSkillWanted), 'Skill Wanted created successfully', 201);
    }

}

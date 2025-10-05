<?php
namespace App\Services\Skills;

use App\Repositories\Skills\SkillWantedRepository;

class SkillWanteddService
{
    protected $repository;

    public function __construct(SkillWantedRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listAll()
    {
        return $this->repository->all();
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }
}

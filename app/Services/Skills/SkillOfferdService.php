<?php
namespace App\Services\Skills;

use App\Repositories\Skills\OfferdSkillsRepository;

class SkillOfferdService
{
    protected $repository;
    public function __construct(OfferdSkillsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listAll()
    {
        return $this->repository->all();
    }

    public function getById($id)
    {

    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, $data)
    {
        // return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        // return $this->repository->delete($id);
    }
}

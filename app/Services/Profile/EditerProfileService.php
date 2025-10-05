<?php
namespace App\Services\Profile;

use App\Repositories\Profile\EditProfileRepository;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class EditerProfileService
{
    use ApiResponse;
    protected $repository;

    public function __construct(EditProfileRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getProfile()
    {
        if (Auth::check()) {
            return $this->repository->getProfile(Auth::user()->id);
        }
        return $this->error('Unauthorized Access', 401);
    }
}

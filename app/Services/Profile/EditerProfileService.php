<?php
namespace App\Services\Profile;

use App\Repositories\Profile\EditProfileRepository;
use App\Repositories\Review\ReviewRepository;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class EditerProfileService
{
    use ApiResponse;
    protected $repository;
    protected $reviewRepository;

    public function __construct(EditProfileRepository $repository, ReviewRepository $reviewRepository)
    {
        $this->repository       = $repository;
        $this->reviewRepository = $reviewRepository;
    }
    public function getProfile()
    {
        if (Auth::check()) {
            $profileData               = $this->repository->getProfile(Auth::user()->id);
            $reviewData                = $this->reviewRepository->getReviewAvg(Auth::user()->id);
            $profileData->rating       = $reviewData['rating'];
            $profileData->rating_count = $reviewData['rating_count'];
            return $profileData;
        }
        return $this->error('Unauthorized Access', 401);
    }

    public function updateProfile($data)
    {
        if (Auth::check()) {
            return $this->repository->updateProfile(Auth::user()->id, $data);
        }
        return $this->error('Unauthorized Access', 401);
    }
}

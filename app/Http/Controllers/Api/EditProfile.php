<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\EditProfileRequest;
use App\Http\Resources\Profile\EditProfileResource;
use App\Services\Profile\EditerProfileService;
use App\Traits\ApiResponse;

class EditProfile extends Controller
{
    use ApiResponse;
    protected $service;
    public function __construct(EditerProfileService $service)
    {
        $this->service = $service;
    }

    public function getProfile()
    {
        return $this->success(new EditProfileResource($this->service->getProfile()), 'Profile fetched successfully', 200);
    }

    public function updateProfile(EditProfileRequest $request)
    {
        return $this->success(new EditProfileResource($this->service->updateProfile($request->validated())), 'Profile updated successfully', 200);
    }
}

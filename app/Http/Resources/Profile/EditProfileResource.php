<?php
namespace App\Http\Resources\Profile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EditProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'email'           => $this->email,
            'location'        => $this->location,
            'bio'             => $this->bio,
            'create_at'       => $this->create_at,
            'profile_picture' => $this->profile_picture,
            'rating'          => $this->rating,
            'rating_count'    => $this->rating_count,
        ];
    }
}

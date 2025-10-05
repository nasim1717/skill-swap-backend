<?php
namespace App\Repositories\Profile;

use App\Models\User;

class EditProfileRepository
{
    public function getProfile($userId)
    {
        $data = User::where('id', $userId)->first();

        return $data;
    }

    public function updateProfile($userId, $data)
    {
        return User::where('id', $userId)->update($data);
    }
}

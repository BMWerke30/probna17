<?php

namespace App\Services;

use App\Strategies\Register\OwnerRegisterStrategy;
use App\Strategies\Register\RegisterStrategy;
use App\Strategies\Register\TouristRegisterStrategy;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserCreateService
{
    public function register(array $data): User
    {
        $user = User::create(
            [
                'name' => $data['name'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]
        );

        $this->getUserRoleStrategy($data['owner'] ?? 0)->attachRoleToUser($user);

        return $user;
    }

    private function getUSerRoleStrategy(int $ownerFlag): RegisterStrategy
    {
        if($ownerFlag === 1) {
            return new OwnerRegisterStrategy();
        }

        return new TouristRegisterStrategy();
    }
}

<?php

namespace App\Strategies\Register;

use App\User;

interface RegisterStrategy
{
    public function attachRoleToUser(User $user): void;
}

<?php

namespace App\Strategies\Register;

use App\Role;
use App\User;

class DefaultRegisterStrategy
{
    protected function attach(User $user, array $roleName): void
    {
        $rolesId = Role::query()
            ->whereIn('name', $roleName)
            ->get('id');
        $user->roles()->attach($rolesId);
    }
}

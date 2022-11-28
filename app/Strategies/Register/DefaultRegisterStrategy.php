<?php

namespace App\Strategies\Register;

use App\Role;
use App\User;

class DefaultRegisterStrategy
{
    protected function attach(User $user, string $roleName): void
    {
        $roleId = Role::query()
            ->where('name', $roleName)
            ->get('id')
            ->first();
        $user->roles()->attach($roleId);
    }
}

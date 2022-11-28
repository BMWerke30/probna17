<?php

namespace App\Strategies\Register;

use App\Role;
use App\User;

class OwnerRegisterStrategy extends DefaultRegisterStrategy implements RegisterStrategy
{
    public function attachRoleToUser(User $user): void
    {
        $this->attach($user, [Role::OWNER, Role::TOURIST]);
    }
}

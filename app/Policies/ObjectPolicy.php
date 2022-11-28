<?php

namespace App\Policies;

use App\{TouristObject, User};
use Illuminate\Auth\Access\HandlesAuthorization;


class ObjectPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function checkOwner(User $user, TouristObject $object): bool
    {
        return $user->id === $object->user_id;
    }
}

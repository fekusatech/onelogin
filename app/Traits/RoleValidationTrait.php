<?php

// app/Traits/RoleValidationTrait.php

namespace App\Traits;

trait RoleValidationTrait
{
    public function validateUserRole($user)
    {
        if ($user && ($user->role === 1 || $user->role === 3)) {
            return true;
        }
        return false;
    }
}

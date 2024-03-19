<?php

namespace Tests;

use App\Models\Enums\UserRole;
use App\Models\User;

trait WithUsers
{
    protected function createUser(UserRole $userRole)
    {
        $user = User::factory()->create();
        $user->role = $userRole;
        $user->save();

        return $user;
    }
}
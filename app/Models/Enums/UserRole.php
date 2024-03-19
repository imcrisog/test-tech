<?php

namespace App\Models\Enums;

enum UserRole: int {
    case ADMIN = 0;
    case USER = 1; 

    public function isAdmin(): bool
    {
        return $this == self::ADMIN;
    }
}
<?php

namespace App\Services\Impl;

use App\Services\UserService;

class UserServiceImpl implements UserService
{
    // gunakan inmemory, untuk menyimpan user login
    private array $users = [
        "abil" => "rahasia"
    ];

    function login(string $user, string $password): bool
    {
        // cek apakah user dengan id abil?
        if (!isset($this->users[$user])) {
            return false;
        }

        // kalau ada, ambil password nya
        $correctPassword = $this->users[$user];
        return $password == $correctPassword;
    }
}

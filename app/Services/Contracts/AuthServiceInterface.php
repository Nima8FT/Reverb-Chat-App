<?php

namespace App\Services\Contracts;

interface AuthServiceInterface
{
    public function register(array $data);

    public function login(array $data);

    public function logout();
}

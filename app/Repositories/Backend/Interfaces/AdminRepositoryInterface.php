<?php

namespace App\Repositories\Backend\Interfaces;

interface AdminRepositoryInterface
{
    public function signIn($email, $password);
}

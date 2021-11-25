<?php

namespace App\Services\Backend\Interfaces;

interface AdminServicesInterface
{
    public function signIn($request);

    public function signOut();
}

<?php

namespace App\Repositories\Backend\Interfaces;

interface RoleRepositoryInterface
{
    public function store($options);

    public function getIdSpecialRole();

    public function getRoleByName($name);
}

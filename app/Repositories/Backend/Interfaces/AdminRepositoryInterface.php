<?php

namespace App\Repositories\Backend\Interfaces;

interface AdminRepositoryInterface
{
    public function isEmail($email);

    public function signIn($email, $password);

    public function store($options);

    public function findById($id);

    public function update($options, $id);
}

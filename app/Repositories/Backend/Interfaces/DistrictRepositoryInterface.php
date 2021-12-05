<?php

namespace App\Repositories\Backend\Interfaces;

interface DistrictRepositoryInterface
{
    public function store($options);

    public function getDistrictByCode($code);
}

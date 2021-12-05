<?php

namespace App\Repositories\Backend\Interfaces;

interface CityRepositoryInterface
{
    public function store($options);

    public function getCityByCode($code);
}

<?php

namespace App\Repositories\Backend\Interfaces;

interface CountryRepositoryInterface
{
    public function store($options);

    public function getCountryByCode($code);
}

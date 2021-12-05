<?php
declare(strict_types=1);

namespace App\Repositories\Backend;

use App\Models\City;
use App\Repositories\Backend\Interfaces\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface
{
    /**
     * @var City
     */
    protected $city;

    /**
     * RoleRepository constructor.
     * @param City $city
     */
    public function __construct(
        City $city
    ) {
        $this->city = $city;
    }

    /**
     * @param $options
     * @return mixed
     */
    public function store($options)
    {
        return $this->city->create($options);
    }

    /**
     * @param $code
     * @return mixed
     */
    public function getCityByCode($code)
    {
        return $this->city->where('city_code', $code)->first();
    }
}

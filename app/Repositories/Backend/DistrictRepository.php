<?php
declare(strict_types=1);

namespace App\Repositories\Backend;

use App\Models\District;
use App\Repositories\Backend\Interfaces\DistrictRepositoryInterface;

class DistrictRepository implements DistrictRepositoryInterface
{
    /**
     * @var District
     */
    protected $district;

    /**
     * RoleRepository constructor.
     * @param District $district
     */
    public function __construct(
        District $district
    ) {
        $this->district = $district;
    }

    /**
     * @param $options
     * @return mixed
     */
    public function store($options)
    {
        return $this->district->create($options);
    }

    /**
     * @param $code
     * @return mixed
     */
    public function getDistrictByCode($code)
    {
        return $this->district->where('district_code', $code)->first();
    }
}

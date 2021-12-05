<?php
declare(strict_types=1);

namespace App\Repositories\Backend;

use App\Models\Country;
use App\Repositories\Backend\Interfaces\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface
{
    /**
     * @var Country
     */
    protected $country;

    /**
     * RoleRepository constructor.
     * @param Country $country
     */
    public function __construct(
        Country $country
    ) {
        $this->country = $country;
    }

    /**
     * @param $options
     * @return mixed
     */
    public function store($options)
    {
        return $this->country->create($options);
    }

    /**
     * @param $code
     * @return mixed
     */
    public function getCountryByCode($code)
    {
        return $this->country->where('country_code', $code)->first();
    }
}

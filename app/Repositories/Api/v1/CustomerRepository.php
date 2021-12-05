<?php
declare(strict_types=1);

namespace App\Repositories\Api\v1;

use App\Models\Customer;
use App\Repositories\Api\v1\Interfaces\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var Customer
     */
    protected $customer;

    /**
     * CustomerRepository constructor.
     * @param Customer $customer
     */
    public function __construct(
        Customer $customer
    ) {
        $this->customer = $customer;
    }

    /**
     * @param $options
     * @return mixed
     */
    public function store($options)
    {
        return $this->customer->create($options);
    }
}

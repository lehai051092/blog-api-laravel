<?php

namespace App\Http\Controllers\Api\v1\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\Collections\CustomerCollection;
use App\Http\Resources\Api\v1\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customer.
     *
     * @return CustomerCollection
     */
    public function index()
    {
        return new CustomerCollection(Customer::paginate(10));
    }

    /**
     * Show the form for creating a new customer.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created customer in storage.
     *
     * @param Request $request
     * @return CustomerResource
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_dob' => 'required',
            'customer_email' => 'required',
            'customer_password' => 'required',
            'customer_address' => 'required',
            'customer_city' => 'required',
        ]);

        $customer = Customer::create($request->all());

        return new CustomerResource($customer);
    }

    /**
     * Display the specified customer.
     *
     * @param  $customer
     * @return CustomerResource
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified customer.
     *
     * @param $customer
     * @return Response
     */
    public function edit($customer)
    {
        //
    }

    /**
     * Update the specified customer in storage.
     *
     * @param Request $request
     * @param $customer
     * @return CustomerResource
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());

        return new CustomerResource($customer);
    }

    /**
     * Remove the specified customer from storage.
     *
     * @param $customer
     * @return Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
    }
}

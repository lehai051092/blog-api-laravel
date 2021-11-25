<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Backend\Interfaces\AdminServicesInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * @var AdminServicesInterface
     */
    protected $adminServices;

    /**
     * AdminController constructor.
     * @param AdminServicesInterface $adminServices
     */
    public function __construct(
        AdminServicesInterface $adminServices
    ) {
        $this->adminServices = $adminServices;
    }

    /**
     * @param LoginRequest $request
     * @return Redirect
     */
    public function signIn(LoginRequest $request)
    {
        return $this->adminServices->signIn($request);
    }

    /**
     * @return Redirect
     */
    public function signOut()
    {
        return $this->adminServices->signOut();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

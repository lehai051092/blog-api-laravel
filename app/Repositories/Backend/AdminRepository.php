<?php
declare(strict_types=1);

namespace App\Repositories\Backend;

use App\Models\Admin;
use App\Repositories\Backend\Interfaces\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{
    /**
     * @var Admin
     */
    protected $admin;

    /**
     * AdminRepository constructor.
     * @param Admin $admin
     */
    public function __construct(
        Admin $admin
    ) {
        $this->admin = $admin;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function isEmail($email)
    {
       return $this->admin->where('admin_email', $email)->first();
    }

    /**
     * @param $email
     * @param $password
     * @return object
     */
    public function signIn($email, $password)
    {
        return $this->admin->where('admin_email', $email)->where('admin_password', $password)->where('admin_status', 1)->first();
    }

    /**
     * @param $options
     * @return mixed
     */
    public function store($options)
    {
        return $this->admin->create($options);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->admin->findOrFail($id);
    }

    /**
     * @param $options
     * @param $id
     * @return mixed
     */
    public function update($options, $id)
    {
       return $this->findById($id)->update($options);
    }
}

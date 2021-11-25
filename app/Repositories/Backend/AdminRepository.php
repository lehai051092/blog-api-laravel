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
     * @param $password
     * @return object
     */
    public function signIn($email, $password)
    {
        return $this->admin->where('admin_email', $email)->where('admin_password', $password)->first();
    }
}

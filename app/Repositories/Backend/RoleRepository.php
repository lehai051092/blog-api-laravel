<?php
declare(strict_types=1);

namespace App\Repositories\Backend;

use App\Constants\Common;
use App\Models\Role;
use App\Repositories\Backend\Interfaces\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    /**
     * @var Role
     */
    protected $role;

    /**
     * RoleRepository constructor.
     * @param Role $role
     */
    public function __construct(
        Role $role
    ) {
        $this->role = $role;
    }

    /**
     * @param $options
     * @return mixed
     */
    public function store($options)
    {
        return $this->role->create($options);
    }

    /**
     * Get Special Role
     * @return mixed
     */
    public function getIdSpecialRole()
    {
        return $this->role->select('role_id')->where('role_type', Common::ROLE_ADMIN)->where('role_name', 'Special Role')->first();
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getRoleByName($name)
    {
        return $this->role->where('role_type', Common::ROLE_CUSTOMER)->where('role_name', $name)->first();
    }
}

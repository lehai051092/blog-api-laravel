<?php
declare(strict_types=1);

namespace App\Services\Backend;

use App\Repositories\Backend\Interfaces\AdminRepositoryInterface;
use App\Services\Backend\Interfaces\AdminServicesInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminService implements AdminServicesInterface
{
    /**
     * @var AdminRepositoryInterface
     */
    protected $adminRepository;

    /**
     * AdminService constructor.
     * @param AdminRepositoryInterface $adminRepository
     */
    public function __construct(
        AdminRepositoryInterface $adminRepository
    ) {
        $this->adminRepository = $adminRepository;
    }

    /**
     * @param $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function signIn($request)
    {
        return $this->adminRepository->signIn($request->email, md5($request->password));
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        $options = [
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_password' => md5($request->admin_password)
        ];

        return $this->adminRepository->store($options);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function profile($id)
    {
        return $this->adminRepository->findById($id);
    }
}

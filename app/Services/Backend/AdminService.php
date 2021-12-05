<?php
declare(strict_types=1);

namespace App\Services\Backend;

use App\Repositories\Backend\Interfaces\AdminRepositoryInterface;
use App\Services\Backend\Interfaces\AdminServicesInterface;
use App\Traits\UploadImageTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminService implements AdminServicesInterface
{
    use UploadImageTrait;

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
            'admin_first_name' => $request->admin_first_name,
            'admin_last_name' => $request->admin_last_name,
            'admin_email' => $request->admin_email,
            'admin_password' => md5($request->admin_password)
        ];

        return $this->adminRepository->store($options);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->adminRepository->findById($id);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        if ($request->admin_image_new) {
            $pathImageOld = str_replace('/storage', '', $request->admin_image_old);
            if ($pathImageOld) {
                Storage::delete('/public' . $pathImageOld);
            }
            $data = $this->storageTrailUpload($request, 'admin_image_new', 'admin');
            $data = $data['file_path'];
        } else {
            $data = $request->admin_image_old;
        }

        $options = [
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_phone' => $request->admin_phone,
            'admin_image' => $data,
            'admin_status' => $request->admin_status,
            'admin_role_id' => $request->admin_role_id
        ];

        return $this->adminRepository->update($options, $id);
    }
}

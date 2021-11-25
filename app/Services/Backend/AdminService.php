<?php
declare(strict_types=1);

namespace App\Services\Backend;

use App\Repositories\Backend\Interfaces\AdminRepositoryInterface;
use App\Services\Backend\Interfaces\AdminServicesInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

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
        $admin = $this->adminRepository->signIn($request->email, md5($request->password));

        if (isset($admin)) {
            Session::put([
                'admin_id' => $admin->admin_id,
                'admin_name' => $admin->admin_name,
                'message' => 'Sign in successfully'
            ]);

            return redirect()->route('dashboard');
        }

        Session::put('message', "Re-enter email and password!!! Something went wrong.");
        return view('pages.login');
    }

    /**
     * @return RedirectResponse
     */
    public function signOut()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        Session::put('message', 'Sign out successfully');
        return redirect()->route('signIn');
    }
}

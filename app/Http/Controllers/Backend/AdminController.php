<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\RegisterForm;
use App\Http\Requests\Admin\UpdateRequest;
use App\Services\Backend\Interfaces\AdminServicesInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
     * @return Application|Factory|View|RedirectResponse
     */
    public function signIn(LoginRequest $request)
    {
        $admin = $this->adminServices->signIn($request);
        if (isset($admin)) {
            Session::put([
                'admin_id' => $admin->admin_id,
                'admin_name' => $admin->admin_name,
                'message' => 'Sign in successfully'
            ]);

            return redirect()->route('dashboard');
        }

        Session::put('error', "Re-enter email and password!!! Something went wrong.");
        return view('pages.admin.login');
    }

    /**
     * @return RedirectResponse
     */
    public function signOut()
    {
        Session::put([
            'admin_name' => null,
            'admin_id' => null,
            'message' => 'Sign out successfully'
        ]);

        return redirect()->route('signIn');
    }

    /**
     * @return Application|Factory|View
     */
    public function register()
    {
        return view('pages.admin.register');
    }

    /**
     * @param RegisterForm $request
     * @return Application|Factory|View
     */
    public function store(RegisterForm $request)
    {
        $admin = $this->adminServices->store($request);

        if ($admin) {
            Session::put('message', 'Register admin successfully');
        } else {
            Session::put('error', 'Register admin failed. Something went wrong.');
        }

        return view('pages.admin.register');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function profile($id)
    {
        $admin = $this->adminServices->findById($id);
        return view('pages.admin.profile', compact('admin'));
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        $hasUpdate = $this->adminServices->update($request, $id);
        if ($hasUpdate) {
            Session::put('message', 'Update admin successfully');
        } else {
            Session::put('error', 'Update admin failed. Something went wrong.');
        }

        return redirect()->route('profile', ['id' => $id]);
    }

    public function destroy($id)
    {
        // test 23
    }
}

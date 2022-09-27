<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(): View
    {
        $users = User::doesnthave('membership')->paginate(8);

        return view('admin.user.index', compact('users'));
    }

    public function create(): View
    {
        $roles = Role::where('name', '!=', 'user')->get();

        return view('admin.user.create', compact('roles'));
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $extra = [
            'password' => Hash::make(Str::random(10)),
            'approved_at' => now(),
        ];

        $user = User::create($request->except('role_id') + $extra);

        $user->syncRoles($request->get('role_id'));

        Password::sendResetLink($request->only('email'));

        return redirect()
            ->route('admin.user.index')
            ->with('message', 'Record has been created');
    }

    public function edit(User $user): View
    {
        $roles = Role::where('name', '!=', 'user')->get();

        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->except('role_id'));

        $user->syncRoles($request->get('role_id'));

        return redirect()
            ->route('admin.user.index')
            ->with('message', 'Record has been updated');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('message', 'Record has been deleted');
    }
}

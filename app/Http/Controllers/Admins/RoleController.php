<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Roles/Index',[
            'roles'=>Role::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Roles/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Role::create($request->only(['name']));
        return redirect(route('admin.roles.index'))->withSuccess('Role created successfully!');
    }

    public function show(Role $role)
    {
        return Inertia::render('Admin/Roles/Show', [
            'role' => $role,
        ]);
    }

    public function edit(Role $role)
    {
        //
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $role->update($request->only(['name']));
        return redirect(route('admin.roles.index'))->withSuccess('Role updated successfully!');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('admin.roles.index'))->withSuccess('Role deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index()
    {
        if(Gate::allows('accessRoles')) {
            return Inertia::render('Admin/Roles/Index',[
                'roles'=>Role::all()
            ]);
        }
        return back();
    }

    public function create()
    {
        if(Gate::allows('manageRoles')) {
            return Inertia::render('Admin/Roles/Create');
        }
        return back();
    }

    public function store(Request $request)
    {
        if(Gate::allows('manageRoles')) {
            $request->validate([
                'name' => 'required'
            ]);
            Role::create($request->only(['name']));
            return redirect(route('admin.roles.index'))->withSuccess('Role created successfully!');
        }
        return back();
    }

    public function show(Role $role)
    {
        if(Gate::allows('accessRoles')) {
            return Inertia::render('Admin/Roles/Show', [
                'role' => $role,
            ]);
        }
        return back();
    }

    public function edit(Role $role)
    {
        //
    }

    public function update(Request $request, Role $role)
    {
        if(Gate::allows('manageRoles')) {
            $request->validate([
                'name' => 'required'
            ]);
            $role->update($request->only(['name']));
            return redirect(route('admin.roles.index'))->withSuccess('Role updated successfully!');
        }
        return back();
    }

    public function destroy(Role $role)
    {
        if(Gate::allows('manageRoles')) {
            $role->delete();
            return redirect(route('admin.roles.index'))->withSuccess('Role deleted successfully!');
        }
        return back();
    }
}

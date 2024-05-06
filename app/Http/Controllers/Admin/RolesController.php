<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['roles'] = Role::with('users')->orderBy('name')->get();
        $this->data['permissions'] = Permission::orderBy('name')->get();

        return view('admin.roles.roles', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard,
        ]);

        $role->givePermissionTo($request->input('permissions'), 'admin');

        return response()->json(['status' => true, 'msg' => 'Role Created Successfully']);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['item'] = Role::find($id);
        return view('admin.roles.role_view', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permissions =Permission::orderBy('name')->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        $html = view('admin.roles.edit_role', compact('role','permissions','rolePermissions'))->render();
        return response()->json(['status' => true, 'html' => $html]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permissions' => 'required',
        ]);

        $role = Role::find($id);

if (!$role) {
    return back()->with('error', 'Role not found.');
}

$role->name = $request->input('name');
$role->guard_name = $request->guard_name ? $request->guard_name : 'admin';

        try {
            $role->save();

            $updatedPermissions = $request->input('permissions', []);
            $role->syncPermissions($updatedPermissions);
            return response()->json(['status' => true, 'msg' => 'Role Updated Successfully']);
        } catch (\Exception $e) {
            return back()->with('error', "Failed to update role: {$e->getMessage()}");
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return response()->json(['status'=>true, 'msg'=>'Role Deleted Successfully']);
    }
}

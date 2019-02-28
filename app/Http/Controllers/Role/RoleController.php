<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRole;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Permission\Models\Role as SpatieRole;
use App\User;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.role.index-role');
    }

    public function data()
    {
        $roles = SpatieRole::all();
        return DataTables::of($roles)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = (new Role)->max('id') + 1;
        return view('pages.role.create-role', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {
        //
        $permissions = Permission::all();
        $role = SpatieRole::create([
            'name' => $request->input('role_name'),
            // 'role_description' => $request->input('role_description'),
            // 'role_function' => $request->input('role_function'),
            // 'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        $role->givePermissionTo($permissions);
        return redirect('role')->with('success', 'Successfull create role');
    }

    /**
     * Active / Deactive
     * 
     * @return Role Status
     */
    public function action(Request $request, $id)
    {
        $role = Role::find($id);
        if ($request->input('active') == 'Deactive') {
            $role->active = 'Deactive';
            $role->save();
        } else if ($request->input('active') == 'Active'){
            $role->active = 'Active';
            $role->save();
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $permissions = Permission::all()->pluck('name');
        $role = SpatieRole::findById($id)->hasPermissionTo($permissions);
        // $role->hasAnyPermission()
        // $user = User::find(auth()->id());
        // $user->hasRole($per);
        return var_dump($role);
        return $permissions->hasAnyPermission($per);
        return view('pages.role.role-permission', compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role, $id)
    {
        //
        $role = Role::find($id);
        return view('pages.role.create-role', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRole $request, Role $role)
    {
        //
        $role::find($request->id)->update([
            'role_name' => $request->input('role_name'),
            'role_description' => $request->input('role_description'),
            'role_function' => $request->input('role_function'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        return redirect('role')->with('success', 'Successfull create role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRole;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Permission\Models\Role as SpatieRole;
use App\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Model\Page;
use App\Model\RolePage;

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
        // $permissions = Permission::all();
        $role = SpatieRole::create([
            'name' => $request->input('role_name'),
            // 'role_description' => $request->input('role_description'),
            // 'role_function' => $request->input('role_function'),
            // 'active' => $request->input('active') == null ? 'Not Active' : 'Active'
        ]);
        // $role->givePermissionTo($permissions);
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
        } elseif ($request->input('active') == 'Active') {
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
        $user = Auth::user()->permissions;
        $roles = SpatieRole::find($id);
        $permissions = $roles->permissions;
        $length = count($permissions);
        $permission = [];
        foreach ($permissions as $key => $value) {
            $permission[$value->name] = $value;
        }
        // return array_key_exists('delete', $permission) ? 'ok' : 'nooo';
        // $role->hasAnyPermission()
        // $user = User::find(auth()->id());
        // $user->hasRole($per);
        if ($length == 0) {
            return view('pages.role.role-permission', compact('roles', 'permission', 'length'));
        } else {
            return view('pages.role.role-permission', compact('roles', 'permission', 'length'));
        }
    }

    /**
     * Set Role Permission
     *
     */
    public function setPermission(Request $request, $id)
    {
        // $user = Auth::user();
        $roles = SpatieRole::find($id);
        // $user->assignRole($roles->name);
        
        if ($request->input('create') == null) {
            // $user->revokePermissionTo('create');
            $roles->revokePermissionTo('create');
        } else {
            // $user->givePermissionTo('create');
            $roles->givePermissionTo('create');
        }

        if ($request->input('read') == null) {
            // $user->revokePermissionTo('read');
            $roles->revokePermissionTo('read');
        } else {
            // $user->givePermissionTo('read');
            $roles->givePermissionTo('read');
        }

        if ($request->input('update') == null) {
            // $user->revokePermissionTo('update');
            $roles->revokePermissionTo('update');
        } else {
            // $user->givePermissionTo('update');
            $roles->givePermissionTo('update');
        }

        if ($request->input('delete') == null) {
            // $user->revokePermissionTo('delete');
            $roles->revokePermissionTo('delete');
        } else {
            // $user->givePermissionTo('delete');
            $roles->givePermissionTo('delete');
        }
        
        
        
        
        // $create = $request->input('create') == null ? $user->revokePermissionTo('create') : $user->givePermissionTo('create');
        // $read = $request->input('read') == null ? $user->revokePermissionTo('read') : $user->givePermissionTo('read');
        // $update = $request->input('update') == null ? $user->revokePermissionTo('update') : $user->givePermissionTo('update');
        // $delete = $request->input('delete') == null ? $user->revokePermissionTo('delete') : $user->givePermissionTo('delete');

        // $roles->givePermissionTo([$create, $read, $update, $delete]);
        return $roles;
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

    /**
     * Page authorization
     *
     */
    public function page(Page $page, $id)
    {
        $role_id = SpatieRole::find($id)->id;
        $pages = $page::all();
        $role_pages = RolePage::where('role_id', $role_id)->get();

        foreach ($pages as $key => $value) {
            $pages_id[] = $value->id;
        }

        if (count($role_pages) > 0) {
            foreach ($role_pages as $key => $value) {
                $roles_id[] = $value->page_id;
                sort($roles_id);
            }
        } else {
            $roles_id = [];
        }
        // return $roles_id;
        return view('pages.role.page-role', compact('role_pages', 'pages', 'role_id', 'pages_id', 'roles_id'));
    }

    /**
     * Update Page
     *
     */
    public function updatePage(Request $request, $id)
    {
        $role = SpatieRole::find($id);
        RolePage::updateOrCreate([
            'role_id' => $role->id,
            'page_id' => $request->input('page_id')
        ],[
            'role_id' => $role->id,
            'page_id' => $request->input('page_id')
        ]);
        $pages = Page::all();
        foreach ($pages as $page) {
            $page->assignRole($role);
        }
    }
}

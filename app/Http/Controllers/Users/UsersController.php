<?php

namespace App\Http\Controllers\Users;

use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\StoreUsers;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.user.index-user');
    }

    public function data()
    {
        $users = User::with('roles')->get();
        return DataTables::of($users)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = SpatieRole::all();
        $id = (new User)->max('id') + 1;
        return view('pages.user.create-user', compact('roles', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsers $request)
    {
        //
        $users = User::create([
            'name' => $request->input('fullname'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active',
            'password' => $request->input('password')
        ]);

        $roles_permission = SpatieRole::findByName($request->input('role_id'))->permissions;
        $users->assignRole($request->input('role_id'));
        $users->givePermissionTo($roles_permission);
        return redirect('users')->with('success', 'Successfull create user');
    }

    /**
     * Active / Deactive
     *
     * @return Users Status
     */
    public function action(Request $request, $id)
    {
        $users = Users::find($id);
        if ($request->input('active') == 'Deactive') {
            $users->active = 'Deactive';
            $users->save();
        } elseif ($request->input('active') == 'Active') {
            $users->active = 'Active';
            $users->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users, $id)
    {
        //
        $roles = SpatieRole::all();
        $users = Users::find($id);
        return view('pages.user.create-user', compact('roles', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUsers $request, User $users)
    {
        //
        $roles_permission = SpatieRole::findByName($request->input('role_id'))->permissions;
        // return $roles_permission;
        $users = $users::find($request->id);
        $users->update([
            'name' => $request->input('fullname'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active',
            'password' => Hash::make($request->input('password'))
        ]);

        $permission = SpatieRole::findByName($request->input('role_id'));
        $users->givePermissionTo($roles_permission);
        $users->assignRole($request->input('role_id'));
        return redirect('/users')->with('success', 'Successfull Update user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}

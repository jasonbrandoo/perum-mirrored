<?php

namespace App\Http\Controllers\Users;

use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\User;
use App\Http\Requests\StoreUsers;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

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
        $roles = Role::where('active', 'active')->get();
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
        User::create([
            'role_id' => $request->input('role_id'),
            'staff_id' => $request->input('staff_id'),
            'name' => $request->input('fullname'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active',
            'password' => $request->input('password')
        ]);
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
        } else if ($request->input('active') == 'Active'){
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
        $roles = Role::where('active', 'active')->get();
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
        $users::find($request->id)->update([
            'role_id' => $request->input('role_id'),
            'staff_id' => $request->input('staff_id'),
            'name' => $request->input('fullname'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'active' => $request->input('active') == null ? 'Not Active' : 'Active',
            'password' => Hash::make($request->input('password'))
        ]);
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

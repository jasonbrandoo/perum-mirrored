<?php

namespace App\Http\Controllers\Users;

use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\User;
use App\Http\Requests\StoreUsers;
use Yajra\DataTables\DataTables;

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
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
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

<?php

namespace App\Http\Controllers;


use App\User;
use App\Role;
use App\Models\Permit;
use App\Models\Contractor;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Permit as ModelsPermit;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }

    
    public function create()
    {
        $roles = Role::where('status', '=', 1)->get();
        $contractors = Contractor::all();
        return view('users.create')
        ->with('roles',$roles)
        ->with('contractors',$contractors);
    }
    
    public function store(StoreUserRequest $request)
    {
        $request ->validated();
        $user = User::create([
            'name' => $request['name'],
            'user'  => $request['user'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
            'contractor_id' => $request['contractor_id'],
        ]);
        Permit::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show',[
            'user'=>$user
            ]);
    }
    
    public function edit(User $user)
    {
        $roles = Role::where('status', '=', 1)->get();
        $contractors = Contractor::all();
        return view('users.edit',[
            'user'=>$user
            ])
        ->with('roles', $roles)
        ->with('contractors', $contractors);
    }

    public function update($id, UpdateUserRequest $request)
    {
        $user = User::where('id',$id)->first();
        $user->update($request->validated());
        return redirect()->route('users.index');
    }
    
    
}

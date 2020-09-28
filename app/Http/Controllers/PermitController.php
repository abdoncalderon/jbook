<?php

namespace App\Http\Controllers;

Use App\User;
Use App\Models\Permit;


class PermitController extends Controller
{
    public function index(User $user)
    {
        return view('permits.index', compact('user'));
    }
      

    public function edit(Permit $permit)
    {
        return view('permits.edit',[
            'permit'=>$permit
            ]);
    }
    
    public function update(Permit $permit, UpdatePermitRequest $request)
    {
        $permit->update($request->validated());

        return redirect()->route('permits.index');
    }
}

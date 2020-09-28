<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\LocationUser;

class LocationUserController extends Controller
{
    public function index(User $user)
    {
        return view('locationsUsers.index', compact('user'));
    }
      

    public function edit(LocationUser $locationUser)
    {
        return view('locationsUsers.edit',[
            'permit'=>$locationUser
            ]);
    }
    
    public function update(LocationUser $locationUser, UpdatePermitRequest $request)
    {
        $locationUser->update($request->validated());

        return redirect()->route('locationsUsers.index');
    }
}

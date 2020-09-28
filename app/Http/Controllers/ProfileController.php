<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::where('id',$id)->first();

        return view('profiles.show',[
            'user'=>$user
            ]);
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();

        return view('profiles.edit',[
            'user'=>$user
            ]);
    }

    public function update($id, UpdateProfileRequest $request)
    {
        $user = User::where('id',$id)->first();

        $name = $user->avatar;

        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/users/',$name);
        }

        $user->avatar = $name;

        $user->update($request->validated());
        
        return redirect()->route('home');

        
    }
}

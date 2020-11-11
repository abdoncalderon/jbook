<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Location;
use App\Models\LocationUser;
use App\Http\Requests\StoreLocationUserRequest;

class LocationUserController extends Controller
{
    public function index(User $user)
    {
        return view('locationsUsers.index', compact('user'));
    }

    public function create(User $user)
    {
        if($user->locations->count()>0){
            $locations = Location::select('locations.id as id','locations.name as name')->leftJoin('location_users','locations.id','=','location_users.location_id')->whereNull('user_id')->get();
        }else{
            $locations = Location::all();
        }
        // dd($locations);
        return view('locationsUsers.create')
        ->with('user',$user)
        ->with('locations',$locations);
    }
      
    public function store(StoreLocationUserRequest $request, User $user )
    {
        LocationUser::create($request ->validated());
        return redirect()->route('locationsUsers.index',$user);
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

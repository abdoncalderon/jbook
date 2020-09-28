<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::get();
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(StorePositionRequest $request )
    {
        Position::create($request ->validated());
        
        return redirect()->route('positions.index');
    }

    public function show(Position $position)
    {
        return view('positions.show',[
            'position'=>$position
            ]);
    }

    public function edit(Position $position)
    {
        return view('positions.edit',[
            'position'=>$position
            ]);
    }
    
    public function update(Position $position, UpdatePositionRequest $request)
    {
        $position->update($request->validated());

        return redirect()->route('positions.index');
    }
}

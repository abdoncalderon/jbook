<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Http\Requests\StoreSectorRequest;
use App\Http\Requests\UpdateSectorRequest;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::get();
        return view('sectors.index', compact('sectors'));
    }

    public function create()
    {
        return view('sectors.create');
    }

    public function store(StoreSectorRequest $request )
    {
        Sector::create($request ->validated());
        
        return redirect()->route('sectors.index');
    }

    public function show(Sector $sector)
    {
        return view('sectors.show',[
            'sector'=>$sector
            ]);
    }

    public function edit(Sector $sector)
    {
        return view('sectors.edit',[
            'sector'=>$sector
            ]);
    }
    
    public function update(Sector $sector, UpdateSectorRequest $request)
    {
        $sector->update($request->validated());

        return redirect()->route('sectors.index');
    }
}

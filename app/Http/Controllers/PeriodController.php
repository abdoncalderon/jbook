<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::get();
        return view('periods.index', compact('periods'));
    }

    public function create()
    {
        return view('periods.create');
    }

    public function store(StorePeriodRequest $request )
    {
        Period::create($request ->validated());
        
        return redirect()->route('periods.index');
    }

    public function show(Period $period)
    {
        return view('periods.show',[
            'period'=>$period
            ]);
    }

    public function edit(Period $period)
    {
        return view('periods.edit',[
            'period'=>$period
            ]);
    }
    
    public function update(Period $period, UpdatePeriodRequest $request)
    {
        $period->update($request->validated());

        return redirect()->route('periods.index');
    }
}

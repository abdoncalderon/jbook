<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use Exception;

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
        $nextday = $request->has('nextday');
        $request ->validated();
        Period::create([
            'name'=>$request->name,
            'start'=>$request->start,
            'finish'=>$request->finish,
            'nextday'=>$nextday,
        ]);
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
        $nextday = $request->has('nextday');
        $request->validated();
        $period->update([
            'start'=>$request->start,
            'finish'=>$request->finish,
            'nextday'=>$nextday,
        ]);
        return redirect()->route('periods.index');
    }

    public function destroy(Period $period)
    {
        try{
            $period->delete();
            return redirect()->route('periods.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use App\Models\Folio;
use App\Models\Equipment;
use App\Models\Position;
use App\Http\Requests\StoreDailyReportRequest;
use App\Http\Requests\UpdateDailyReportRequest;
use App\Models\Contractor;
use Exception;

class DailyReportController extends Controller
{
    public function index()
    {
        $dailyReports = DailyReport::where('user_id',auth()->user()->id)->get();
        return view('dailyreports.index', compact('dailyReports'));
    }

    public function create(Folio $folio)
    {
        $equipments = Equipment::all();
        $positions = Position::all();
        return view('dailyreports.create')
        ->with('folio',$folio)
        ->with('equipments',$equipments)
        ->with('positions',$positions);
    }


    public function store(StoreDailyReportRequest $request)
    {
        try{
            $dailyReport = DailyReport::create($request ->validated());
            return redirect()->route('dailyReports.edit',$dailyReport)->with('messages',__('messages.recordsuccessfullystored'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function review(DailyReport $dailyReport){
        return view('dailyReports.review')
        ->with('dailyReport',$dailyReport);
    }

    public function show(DailyReport $dailyReport){
        return view('dailyReports.show')
        ->with('dailyReport',$dailyReport);
    }

    public function edit(DailyReport $dailyReport)
    {
        $contractors = Contractor::all();
        $equipments = Equipment::all();
        $positions = Position::all();
        $oldDailyReports = DailyReport::select('daily_reports.id as old_daily_report_id', 'folios.date as date', 'turns.name as turn')
                                            ->join('folios','daily_reports.folio_id','=','folios.id')
                                            ->join('turns','daily_reports.turn_id','=','turns.id')
                                            ->where('folios.location_id',$dailyReport->folio->location_id)
                                            ->orderBy('date','desc')
                                            ->get();
        return view('dailyreports.edit')
        ->with('dailyReport',$dailyReport)
        ->with('contractors',$contractors)
        ->with('equipments',$equipments)
        ->with('positions',$positions)
        ->with('oldDailyReports',$oldDailyReports);
    }

    public function update(DailyReport $dailyReport, UpdateDailyReportRequest $request)
    {
        $dailyReport->update($request->validated());
        return redirect()->route('dailyReports.index');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use App\Models\Workbook;
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

    public function create(Workbook $workbook)
    {
        $equipments = Equipment::all();
        $positions = Position::all();
        return view('dailyreports.create')
        ->with('workbook',$workbook)
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

    public function edit(DailyReport $dailyReport)
    {
        $contractors = Contractor::all();
        $equipments = Equipment::all();
        $positions = Position::all();
        $oldDailyReports = DailyReport::select('daily_reports.id as old_daily_report_id', 'workbooks.dateWorkbook as dateWorkbook', 'periods.name as period')
                                            ->join('workbooks','daily_reports.workbook_id','=','workbooks.id')
                                            ->join('periods','daily_reports.period_id','=','periods.id')
                                            ->where('workbooks.location_id',$dailyReport->workbook->location_id)
                                            ->orderBy('dateWorkbook','desc')
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

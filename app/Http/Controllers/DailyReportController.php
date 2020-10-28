<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use App\Models\Workbook;
use App\Models\Equipment;
use App\Models\Position;
use App\Http\Requests\StoreDailyReportRequest;
use App\Models\Contractor;
use App\Models\EquipmentDailyReport;
use App\Models\PositionDailyReport;
use Illuminate\Http\Request;
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
        $equipmentDailyReports = EquipmentDailyReport::where('daily_report_id',$dailyReport->id)->get();
        $positionDailyReports = PositionDailyReport::where('daily_report_id',$dailyReport->id)->get();
        return view('dailyreports.edit')
        ->with('dailyReport',$dailyReport)
        ->with('contractors',$contractors)
        ->with('equipments',$equipments)
        ->with('positions',$positions);
    }

    public function update(DailyReport $dailyReport, UpdateDailyReportRequest $request)
    {
        $dailyReport->update($request->validated());
        return redirect()->route('dailyReports.index');
    }

}

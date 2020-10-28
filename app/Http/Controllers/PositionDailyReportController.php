<?php

namespace App\Http\Controllers;

use App\Models\PositionDailyReport;
use App\Models\DailyReport;
use App\Http\Requests\StorePositionDailyReportRequest;
use Illuminate\Http\Request;
use Exception;

class PositionDailyReportController extends Controller
{
    public function store(StorePositionDailyReportRequest $request){
        try{
            PositionDailyReport::create($request ->validated());
            $dailyReport = DailyReport::find($request->daily_report_id);
            return redirect()->route('dailyReports.edit',$dailyReport);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(PositionDailyReport $positionDailyReport){
        $dailyReport = DailyReport::find($positionDailyReport->daily_report_id);
        $positionDailyReport->delete();
        return redirect()->route('dailyReports.edit',$dailyReport);
    }

    public function clone(Request $request){
        $dateWorkBook = $request->dateWorkbook;
        
    }
}

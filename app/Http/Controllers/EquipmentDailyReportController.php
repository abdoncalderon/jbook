<?php

namespace App\Http\Controllers;

use App\Models\EquipmentDailyReport;
use App\Models\DailyReport;
use App\Http\Requests\StoreEquipmentDailyReportRequest;

use Exception;

class EquipmentDailyReportController extends Controller
{
    public function store(StoreEquipmentDailyReportRequest $request){
        try{
            EquipmentDailyReport::create($request ->validated());
            $dailyReport = DailyReport::find($request->daily_report_id);
            return redirect()->route('dailyReports.edit',$dailyReport);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(EquipmentDailyReport $equipmentDailyReport){
        $dailyReport = DailyReport::find($equipmentDailyReport->daily_report_id);
        $equipmentDailyReport->delete();
        return redirect()->route('dailyReports.edit',$dailyReport);
    }
}

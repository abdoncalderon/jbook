<?php

namespace App\Http\Controllers;

use App\Models\CommentDailyReport;
use App\Models\DailyReport;
use App\Http\Requests\StoreCommentDailyReportRequest;
use Exception;

class CommentDailyReportController extends Controller
{
    public function store(StoreCommentDailyReportRequest $request){
        try{
            CommentDailyReport::create($request ->validated());
            $dailyReport = DailyReport::find($request->daily_report_id);
            return redirect()->route('dailyReports.review',$dailyReport);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(CommentDailyReport $commentDailyReport){
        $dailyReport = DailyReport::find($commentDailyReport->daily_report_id);
        $commentDailyReport->delete();
        return redirect()->route('dailyReports.review',$dailyReport);
    }
}

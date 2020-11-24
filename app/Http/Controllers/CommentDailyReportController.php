<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CommentDailyReport;
use App\Models\DailyReport;
use App\Models\Folio;
use App\Http\Requests\StoreCommentDailyReportRequest;
use Exception;

class CommentDailyReportController extends Controller
{
    public function store(StoreCommentDailyReportRequest $request){
        try{
            $dailyReport = DailyReport::find($request->daily_report_id);
            $date = strtotime($dailyReport->folio->date);
            $today = strtotime(Carbon::today()->toDateString());
            $differenceInHours = abs(round(($date - $today)/60/60,0));
            if (($differenceInHours <= $dailyReport->folio->location->max_time_create_comment)){
                CommentDailyReport::create($request ->validated());
                $dailyReport = DailyReport::find($request->daily_report_id);
                return redirect()->route('dailyReports.review',$dailyReport);
            }else{
                return back()->withErrors(__('messages.timeexpiredtocreate').' '.__('content.comment'));
            }
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

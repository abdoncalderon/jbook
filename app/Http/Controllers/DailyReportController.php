<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;

use App\Models\Workbook;

use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    public function index()
    {
        $dailyReports = DailyReport::where('user_id',auth()->user()->id)->get();
        return view('dailyreports.index', compact('dailyReports'));
    }

    public function create(Workbook $workbook)
    {
        return view('dailyreports.create')
        ->with('workbook',$workbook);
    }
}

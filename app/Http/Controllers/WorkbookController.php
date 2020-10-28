<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Workbook;
use App\Models\Location;
use App\Models\LocationUser;
use App\Http\Requests\StoreWorkbookRequest;
use Illuminate\Http\Request;
use Exception;

class WorkbookController extends Controller
{
    public function index()
    {
        $workbooks = Workbook::where('user_id',auth()->user()->id)->get();
        return view('workbooks.index', compact('workbooks'));
    }

    public function create()
    {
        $locationsUser = LocationUser::where('user_id',auth()->user()->id)->get();
        return view('workbooks.create', compact('locationsUser'));
    }

    public function store(StoreWorkbookRequest $request)
    {
        try{
            $location=Location::find($request->location_id);
            $dateWorkbook = strtotime($request->dateWorkbook);
            $today = strtotime(Carbon::today()->toDateString());
            $differenceInHours = abs(round(($dateWorkbook - $today)/60/60,0));
            if (($differenceInHours <= $location->maxtimeopen)){
                Workbook::create($request ->validated());
                $location->uploadSequence();
                return redirect()->route('workbooks.index')->with('messages',__('messages.recordsuccessfullystored'));
            }else{
                return back()->withErrors(__('messages.timeexpiredtocreate').' '.__('content.legalsheet'));
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        
    }


    public function getNumber(Request $request, $id){
        if($request->ajax())
        {
            $location = Location::where('id',$id)->get();
            return response()->json($location);
        }
    }
}

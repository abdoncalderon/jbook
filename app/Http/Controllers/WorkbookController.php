<?php

namespace App\Http\Controllers;

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
            Workbook::create($request ->validated());
            $location=Location::find($request->location_id);
            $location->uploadSequence();
            return redirect()->route('workbooks.index')->with('messages',__('messages.recordsuccessfullystored'));
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

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Note;
use App\Models\Folio;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use Exception;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id',auth()->user()->id)->get();
        return view('notes.index', compact('notes'));
    }

    public function create(Folio $folio)
    {
        return view('notes.create')
        ->with('folio',$folio);
    }


    public function store(StoreNoteRequest $request)
    {
        try{
            $folio=Folio::find($request->folio_id);
            $date = strtotime($folio->date);
            $today = strtotime(Carbon::today()->toDateString());
            $differenceInHours = abs(round(($date - $today)/60/60,0));
            if (($differenceInHours <= $folio->location->max_time_create_note)){
                $note = Note::create($request ->validated());
                return redirect()->route('notes.edit',$note)->with('messages',__('messages.recordsuccessfullystored'));
            }else{
                return back()->withErrors(__('messages.timeexpiredtocreate').' '.__('content.note'));
            }
            
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(Note $note){
        return view('notes.show')
        ->with('note',$note);
    }

    public function edit(Note $note)
    {
        return view('notes.edit')
        ->with('note',$note);
    }

    public function update(Note $note, UpdateNoteRequest $request)
    {
        $note->update($request->validated());
        return redirect()->route('notes.index');
    }

}

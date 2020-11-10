<?php

namespace App\Http\Controllers;

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
            $note = Note::create($request ->validated());
            return redirect()->route('notes.edit',$note)->with('messages',__('messages.recordsuccessfullystored'));
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

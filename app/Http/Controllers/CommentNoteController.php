<?php

namespace App\Http\Controllers;

use App\Models\CommentNote;
use App\Models\Note;
use App\Http\Requests\StoreCommentNoteRequest;
use Exception;

class CommentNoteController extends Controller
{
    public function store(StoreCommentNoteRequest $request){
        try{
            CommentNote::create($request ->validated());
            $note = Note::find($request->note_id);
            return redirect()->route('notes.show',$note);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(CommentNote $commentNote){
        $note = Note::find($commentNote->note_id);
        $commentNote->delete();
        return redirect()->route('notes.show',$note);
    }
}

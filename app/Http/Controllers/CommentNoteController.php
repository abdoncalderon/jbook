<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CommentNote;
use App\Models\Note;
use App\Models\Folio;
use App\Http\Requests\StoreCommentNoteRequest;
use Exception;

class CommentNoteController extends Controller
{
    public function store(StoreCommentNoteRequest $request){
        try{
            $folio=Folio::find($request->folio_id);
            $date = strtotime($folio->date);
            $today = strtotime(Carbon::today()->toDateString());
            $differenceInHours = abs(round(($date - $today)/60/60,0));
            if (($differenceInHours <= $folio->location->max_time_create_comment)){
                CommentNote::create($request ->validated());
                $note = Note::find($request->note_id);
                return redirect()->route('notes.show',$note);
            }else{
                return back()->withErrors(__('messages.timeexpiredtocreate').' '.__('content.comment'));
            }
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

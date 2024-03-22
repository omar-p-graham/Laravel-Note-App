<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()->where('user_id',Auth::user()->id)->orderBy("created_at","desc")->paginate();
        return view("note.dashboard", ['notes' => $notes]);
        // dd($notes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'note' => 'required|string|max:500',
        ]);
        $data['user_id'] = Auth::user()->id;
        $note = Note::create($data);
        return to_route('note.show',['note'=>$note])->with('message','Note successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if($note->user_id != Auth::user()->id){
            abort(403);
        }
        $note = Note::find($note->id);
        return view('note.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $note = Note::find($note->id);
        return view('note.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if($note->user_id != Auth::user()->id){
            abort(403);
        }
        $request->validate([
            'title'=> 'required|string',
            'note'=> 'required|string|max:500',
        ]);
        $note->update($request->all());
        return to_route('note.show',['note'=>$note])->with('message','Note successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        Note::find($note->id)->delete();
        return to_route('dashboard')->with('message','Note successfully deleted.');
    }

    public function generatePDF(Note $note){
        if($note->user_id != Auth::user()->id){
            abort(403);
        }
        $data = Note::find($note->id);
        $user = User::find($note->user_id);
        $pdf = Pdf::loadView('note.note-pdf', ['note' => $data, 'user' => $user]);
        return $pdf->stream('Note.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\note;
use Illuminate\Http\Request;

class noteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Notes = note::query()
            ->where('user_id', request()->user()->id)
            ->orderBy('created_at', 'desc')->paginate(15);
        // dd($Notes); // the dd is an helper function which the prints the variable and dies right here
        return view('note.index', ['Notes' => $Notes]);
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
            'note' => ['required', 'string']
        ]);
        $data['user_id'] =  request()->user()->id;
        $note = note::create($data);
        return to_route('note.show', $note)->with('message', 'created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('note.show', ['notes' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(note $note)
    {

        return view('note.edit', ['notes' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);
        $note->update($data);
        return to_route('note.show', $note)->with('message', 'Note has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        $note->delete();
        return to_route('note.index')->with('message', 'Successfully Deleted');
    }
}

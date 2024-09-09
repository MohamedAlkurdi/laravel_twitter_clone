<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show($id)
    {
        $idea = Idea::findOrFail($id);
        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }

    public function store()
    {
        $user_id = Auth::id();
        $validated = request()->validate([
            'content' => 'required|min:5',
        ]);
    
        Idea::create([
            'content' => request()->get('content', ''),
            'user_id' => $user_id,
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Your post has been added successfully.');
    }
    
    public function destroy($id)
    {
        if(Auth::user()->id !== $id){
            abort(404);
        }
        $idea = Idea::findOrFail($id);
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Post was deleted successfully.');
    }

    public function edit($id)
    {
        if(Auth::user()->id !== $id){
            abort(404);
        }
        $idea = Idea::findOrFail($id);
        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update($id)
    {
        if(Auth::user()->id !== $id){
            abort(404);
        }
        request()->validate([
            'content' => 'required|min:5',
        ]);

        $idea = Idea::findOrFail($id);
        $idea->content = request()->get('content', '');
        $idea->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Idea updated successfully.');
    }

   

}

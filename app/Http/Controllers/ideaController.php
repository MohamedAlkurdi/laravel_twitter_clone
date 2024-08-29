<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class ideaController extends Controller
{
    public function store()
    {
        request()->validate(
            [
                'idea'=>'required|min:5',
            ]
            );
        $idea = idea::create(
            [
                'content' => request()->get('idea', ''),
            ]
        ); 
        return redirect()->route('dashboard')->with('success', 'your post has been added successfully.');
    }
    public function destroy($id){
        $idea = idea::where('id',$id)->firstOrFail()->delete();
        return redirect()->route('dashboard')->with('success','post was deleted sucessfully.');
    }
}

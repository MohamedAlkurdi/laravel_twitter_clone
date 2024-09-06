<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($id){

        Comment::create([
            'idea_id' => $id,
            'content' => request()->get('content'),
        ]);

        return redirect()->route('idea.show', ['id'=> $id])->with("success","comment posted successfully.");
    }
}

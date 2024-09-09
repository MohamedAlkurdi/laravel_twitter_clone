<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store($id){
        $user_id = Auth::id();

        request()->validate([
            'content' => 'required',
        ]);

        Comment::create([
            'idea_id' => $id,
            'user_id' => $user_id,
            'content' => request()->get('content'),
        ]);

        return redirect()->route('idea.show', ['id'=> $id])->with("success","comment posted successfully.");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaLikeController extends Controller
{
    public function like($id){
        $liker = Auth::user();

        $liker->likes()->attach($id);
        return redirect()->route('dashboard', $id)->with('success', 'liked successfully.');
    }

    public function unlike($id){
        $liker = Auth::user();

        $liker->likes()->attach($id);
        return redirect()->route('dashboard', $id)->with('success', 'unliked successfully.');
    }
}

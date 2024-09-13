<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function follow($id){
        $follower = Auth::user();
        $follower->followings()->attach($id);
        return redirect()->route('users.show', $id)->with('success', 'followed successfully.');
    }

    public function unfollow($id){
        $follower = Auth::user();
        $follower->followings()->detach($id);
        return redirect()->route('users.show', $id)->with('success', 'unfollowed successfully.');
    }
}

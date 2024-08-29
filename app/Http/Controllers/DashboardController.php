<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $idea = new idea(
            [
                'content' => 'hello darkness my old friend.',
                'likes' => 34,
            ]
        );
        $idea->save();
        // dd(idea::all());
        return view("index",[
            "ideas" => idea::orderBy('created_at','DESC')->get(),
        ]);
    }
}

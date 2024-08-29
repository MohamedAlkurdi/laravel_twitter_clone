<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class ideaController extends Controller
{
    public function store()
    {
        $idea = idea::create(
            [
                'content' => request()->get('idea', ''),
            ]
        );
        return redirect()->route('dashboard');
    }
}

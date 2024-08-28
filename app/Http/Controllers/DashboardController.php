<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(){
        $users = [
            [
                "name" => "john doe",
                "job" => "memer",
                "age" => 25,
            ],
            [
                "name" => "jane doe",
                "job" => "dancer",
                "age" => 17,
            ],
        ];
        return view("index", ['users'=>$users]);
    }
}

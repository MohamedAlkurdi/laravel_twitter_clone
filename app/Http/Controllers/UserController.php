<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', ['user' => $user, 'ideas'=>$ideas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $ideas = $user->ideas()->paginate(5);
        $editing = true;

        return view('users.show', ['user' => $user, 'editing'=> $editing, 'ideas'=>$ideas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        //
    }

}

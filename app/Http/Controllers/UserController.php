<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', ['user' => $user, 'ideas' => $ideas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $ideas = $user->ideas()->paginate(5);
        $editing = true;

        return view('users.edit', ['user' => $user, 'editing' => $editing, 'ideas' => $ideas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function profile()
    {
        return $this->show(Auth::id());
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'bio' => 'nullable',
            'image' => 'image',
        ]);

        if(request()->has('image')){
            $imagePath = request()->file('image')->store('profile','public');
            $validated['image'] = $imagePath;
            Storage::disk('public')->delete($user->image ?? '');
        }
        $user->update($validated);
        return redirect()->route('profile');
    }
}

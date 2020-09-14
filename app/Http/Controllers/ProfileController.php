<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(10),
        ]);
    }

    public function edit(User $user)
    {
        // Without policy "edit is allowed only for myself"
        //abort_if ($user->isNot(current_user()), 404);

        // With polocy on this way or in route itself
        //$this->authorize('edit', $user);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $atributes = request()->validate([
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)], 
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['file'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:3', 'max:255', 'confirmed']
        ]);
        
        if (request('avatar')) {
            $atributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($atributes);

        return redirect($user->path());
    }
}

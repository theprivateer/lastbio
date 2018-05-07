<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $links = $user->links;

        if($links->count() == 1)
        {
            return redirect()->route('link', $links->first());
        }

        return view('user.show', compact('user', 'links'));
    }
}

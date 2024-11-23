<?php

namespace App\Http\Controllers;

use App\Mail\ActivationCodeMail;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ActivateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'activation' => 'required|string',
        ]);


        $activationCode = strtolower(str_replace(' ', '', $request->activation));
$usercode=strtolower(str_replace(' ', '', Auth::user()->acode));
        if ($activationCode == $usercode) {
            Auth::user()->update(['stats' => 'active']);
            return redirect()->route('dashboard')->with('success', 'Account activated!');
        } else {
            return back()->withErrors(['activation' => 'The activation code is incorrect.']);
        }
    }
    public function update(Request $request, User $user)
    {
        if (Auth::user()->hasRole('admin')) {
            $userToUpdate = User::find($request->user_id);

            if ($userToUpdate) {
                $userToUpdate->approved = true;
                $userToUpdate->acode = strtolower(Str::random(8));
                $userToUpdate->save();

                Mail::to($userToUpdate->email)->send(new ActivationCodeMail($userToUpdate->acode));

                return back()->with('success', 'Your action was successful!');
            }

            return back()->with('error', 'User not found!');
        }

        return abort(403, 'Unauthorized action');
    }

}



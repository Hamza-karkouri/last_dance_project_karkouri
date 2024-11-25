<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class acceptcoachController extends Controller
{
    public function index()
    {

        return view("admin.approvecoach");
    }
    public function store(Request $request){
        $user = User::findOrFail($request->input('user_id'));
        $user->apply = 'accepted';
        $user->roles()->detach();
        $user->roles()->attach(Role::where('name', 'admin')->first());
        $user->save();

        return redirect()->back()->with('success', 'The user has been successfully updated to coach.');
    }
}

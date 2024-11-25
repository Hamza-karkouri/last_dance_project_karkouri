<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CoachappController extends Controller
{

    public function index()
    {

        return view("coach_application");
    }
    public function store(Request $request)
    {
        $userToUpdate = User::find($request->user_id);
        if( $userToUpdate &&  $userToUpdate->apply== null){
            $userToUpdate->apply="under_review";
            $userToUpdate->save();
        };
        return redirect()->back()->with('success', 'Your coach application has been submitted!');
    }

}

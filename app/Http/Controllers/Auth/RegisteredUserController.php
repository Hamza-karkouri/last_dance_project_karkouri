<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Avatar;
use Spatie\Permission\Models\Role;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'number' => ['required'],
        ]);

        $defaultAvatar = 'default-avatar.png';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'password' => Hash::make($request->password),
            'profile' => $defaultAvatar,  // Default avatar initially
        ]);

        if ($request->hasFile('profile')) {

            $file = $request->file('profile');
            $fileName = hash("sha256", file_get_contents($file)) . "." . $file->getClientOriginalExtension();
            $file->move(storage_path("app/public/profile_pictures"), $fileName); // Save to correct path
            $user->update(['profile' =>  $fileName]); // Store the relative path
        } else {
            // If no custom image is uploaded, create avatar using Laravolt Avatar package
            $avatarName = strtolower($request->name) . '.png';
            $avatar = new Avatar();
            $avatar->create($request->name)
                   ->save(storage_path("app/public/profile_pictures/") . $avatarName);
            $user->update(['profile' =>   $avatarName]);
        }

        $role = Role::firstOrCreate(['name' => 'user']);
        $user->assignRole($role);

        event(new Registered($user));

        return redirect(route('login', absolute: false));
    }
}

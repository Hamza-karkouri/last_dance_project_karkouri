<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Define the profile_pictures directory path
        $profilePicturesPath = storage_path('app/public/profile_pictures');

        // Check if the directory exists, if not, create it
        if (!File::exists($profilePicturesPath)) {
            File::makeDirectory($profilePicturesPath, 0755, true); // Create the directory if it doesn't exist
        }

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $coachesRole = Role::firstOrCreate(['name' => 'coach', 'guard_name' => 'web']);
        $usersRole = Role::firstOrCreate(['name' => 'users', 'guard_name' => 'web']);

        // Check if user exists by email
        $user = User::where('email', 'hamza@gmail.com')->first();

        if (!$user) {
            // If user doesn't exist, create new user
            $user = User::create([
                'name' => 'hamza',
                'email' => 'hamza@gmail.com',
                'password' => Hash::make("hamzaraja.1"),
                'number' => '0644414346',
                'profile' => 'default-profile.png',  // Temporary profile image
                'approved' => true,  // Temporary profile image
                'acode' => 'owner',  // Temporary profile image
                'stats' => 'owner',  // Temporary profile image
            ]);
            $user->assignRole('admin');
            $user2 = User::create([
                'name' => 'hamza2php ',
                'email' => 'hamza2@gmail.com',
                'password' => Hash::make("hamzaraja.1"),
                'number' => '0644414346',
                'profile' => 'default-profile.png',  // Temporary profile image
                'approved' => true,  // Temporary profile image
                'acode' => 'owner',  // Temporary profile image
                'stats' => 'owner',

            ]);

            // Assign the admin role to the user
            $user2->assignRole('coach');

            // Generate a profile picture for the admin user
            $avatarName = 'hamza.png';
            Avatar::create($user->name)->save($profilePicturesPath . '/' . $avatarName);

            // Update the profile field with the avatar's file name
            $user->update(['profile' => $avatarName]);
        } else {
            // If user exists, update the existing user profile picture
            $avatarName = 'hamza.png';
            Avatar::create($user->name)->save($profilePicturesPath . '/' . $avatarName);

            // Update the profile field with the avatar's file name
            $user->update(['profile' => $avatarName]);
        }
    }
}

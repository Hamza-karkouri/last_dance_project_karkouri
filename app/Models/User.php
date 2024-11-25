<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravolt\Avatar\Facade as Avatar;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile',
        'name',
        'email',
        'password',
        'number',
        'approved',
        'acode',
        'stats',
        'plan',
        'apply',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the profile picture.
     *
     * If the user has uploaded a profile picture, return its path.
     * Otherwise, generate an avatar dynamically based on the user's name.
     *
     * @return string
     */
    public function getProfilePictureAttribute()
    {
        if ($this->profile) {
            // Return the uploaded profile picture's URL
            return asset('storage/' . $this->profile);
        }

        // Generate an avatar with the user's name
        return Avatar::create($this->name)->toBase64();
    }

    public function classes() {
        return $this->belongsToMany(Classes::class, 'class_student', 'student_id', 'class_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    /** @use HasFactory<\Database\Factories\ClassesFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description', 'coach_id', 'seats'];

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'class_student', 'class_id', 'student_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'class_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = ['name', 'course_id',"video", 'content'];

    /**
     * A lesson belongs to a course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function userss()
    {
        return $this->hasmany(user::class, 'user_id');
    }
}

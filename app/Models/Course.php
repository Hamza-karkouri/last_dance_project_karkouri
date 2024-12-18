<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name',"image", 'description', 'class_id'];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

}

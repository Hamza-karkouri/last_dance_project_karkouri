<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ClassStudent extends Pivot
{
    //
    protected $table = 'class_student';

    protected $fillable = ['class_id', 'student_id'];
}

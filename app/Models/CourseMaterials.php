<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMaterials extends Model
{
    use HasFactory;

    public function Course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function CourseModular()
    {
        return $this->belongsTo(CourseModular::class, 'course_modular');
    }
}

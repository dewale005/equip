<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "description",
        "course",
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class, 'course');
    }

    public function lesson()
    {
        return $this->hasMany(Sectionlesson::class, 'section');
    }
}

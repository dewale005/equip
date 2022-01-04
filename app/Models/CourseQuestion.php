<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseQuestion extends Model
{
    use HasFactory;


    protected $fillable = [
        "question",
        "answer",
        "option1",
        "option2",
        "course",
        "option3",
        "section",
        "total_score",
    ];

}

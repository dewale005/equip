<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sectionlesson extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "duration",
        "description",
        "video_url",
        "audio_url",
        "section",
        "author",
    ];

    public function section()
    {
        return $this->belongsTo(CourseSection::class, 'section');
    }

    public function author_data()
    {
        return $this->belongsTo(Teachers::class, 'author');
    }

    public function course_data()
    {
        return $this->belongsTo(Course::class, 'course');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "duration",
        "description",
        "trailler_url",
        'author',
        "slug",
    ];


    public function author_id()
    {
        return $this->belongsTo(Teachers::class, 'author');
    }

    public function features()
    {
        return $this->hasMany(Features::class, 'course');
    }

    public function rating()
    {
        return $this->hasMany(Ratings::class, 'course');
    }

    public function section()
    {
        return $this->hasMany(CourseSection::class, 'course');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;


    protected $fillable = [
        "title",
        "description",
        "full_name",
        'avatar',
        'slug',
        "rating",
        'facebook',
        'instagram'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'author',)->latest()->limit(4);
    }
}

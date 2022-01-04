<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "user",
    ];

    public function users_data()
    {
        return $this->belongsTo(User::class, 'user',);
    }
}

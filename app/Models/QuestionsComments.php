<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsComments extends Model
{
    use HasFactory;

    protected $fillable = [
        "comment",
        "question",
        'user',
    ];

    public function users_data()
    {
        return $this->belongsTo(User::class, 'user',);
    }
    
}

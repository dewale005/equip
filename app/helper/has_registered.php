<?php

use App\Models\Enrollment;
use Illuminate\Http\Request;

function HasEnrolled($id, $user)
{
    $course = Enrollment::where(['student' => $user->id, 'course' => $id])->first();
    if ($course == null) {
        return false;
    } else {
        return true;
    }
}
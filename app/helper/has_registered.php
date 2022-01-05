<?php

use App\Models\Enrollment;
use App\Models\Quiz;
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

function HasTakenQuiz($id, $user)
{
    $course = Quiz::where(['user' => $user->id, 'lesson' => $id])->first();
    if ($course == null) {
        return true;
    } else {
        return false;
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $course = Course::limit(16)->get();
        return view('school.index', compact('course'));
    }
}

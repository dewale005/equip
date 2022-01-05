<?php

namespace App\Http\Controllers;

use App\Models\CourseQuestion;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $point = User::where(['id' => $user->id])->first();
        $course = Quiz::where(['user' => $user->id, 'lesson' => $request->section])->first();
        if ($course != null) {
            return redirect()->route('home');
        } 
        $question = CourseQuestion::where(['section' => $request->section, 'course' => $request->course])->get();
        $totalScore = 0;
        for ($x = 0; $x < $question->count(); $x++) {
            $int = $x + 1;
            $option = "answer$int";
            if ($request->$option == $question[$x]->answer) {
                $totalScore += (int) $question[$x]->total_score;
            }
        }
        $initalScore = $point->points;
        $point->points = $initalScore + $totalScore;
        $point->save();
        Quiz::create([
            "user" => $user->id,
            "lesson" => $request->section,
            "points" => $totalScore,
        ]);
        return redirect()->route('home');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}

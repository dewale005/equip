<?php

namespace App\Http\Controllers;

use App\Models\CourseQuestion;
use Illuminate\Http\Request;

class CourseQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($section, $course)
    {
        // dd($course, $section);
        $question = CourseQuestion::where(['section' => $section, 'course' => $course])->get();
        return view('school.course.question', compact('course', 'section', 'question'));
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
    public function store(Request $request, $section, $course)
    {
        $message = 'Ops, Something went wrong!!';
        $validated_data = $request->validate([
            'description' => 'required',
            'answer' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'score' => 'required',
        ]);

        $payload = [
            "question" => $validated_data['description'],
            "answer" => $validated_data['answer'],
            "option1" => $validated_data['option1'],
            "option2" => $validated_data['option2'],
            "option3" => $validated_data['option3'],
            "total_score" => $validated_data['score'],
            "section" => $section,
            "course" => $course,
        ];

        $question = CourseQuestion::create($payload);

        if ($question != null) {
            $message = 'Question has been added successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseQuestion  $courseQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(CourseQuestion $courseQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseQuestion  $courseQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseQuestion $courseQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseQuestion  $courseQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id, $request);
        $question = CourseQuestion::where(['id' => $id])->first();
        $message = 'Ops, Something went wrong!!';
        $validated_data = $request->validate([
            'description' => 'required',
            'answer' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'score' => 'required',
        ]);
        $question->question = $validated_data['description'];
        $question->answer  = $validated_data['answer'];
        $question->option1  = $validated_data['option1'];
        $question->option2 = $validated_data['option2'];
        $question->option3 = $validated_data['option3'];
        $question->total_score = $validated_data['score'];
        $question->save();
        if ($question != null) {
            $message = 'Lesson has been updated successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
            // return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseQuestion  $courseQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $message = 'Ops, Something went wrong!!';
        $feature = CourseQuestion::where('id', $id)->delete();
        if ($feature != null) {
            $message = 'Lesson has been deleted successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CourseSection;
use Illuminate\Http\Request;

class CourseSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
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
    public function store(Request $request, $id)
    {
        $message = 'Ops, Something went wrong!!';
        $validated_date = $request->validate([
            "title" => "required",
            "description" => "required"
        ]);
        $section =CourseSection::create([
            'title' => $validated_date['title'],
            'description' => $validated_date['description'],
            "course" => $id
        ]);
        if ($section != null) {
            $message = 'A Section has been updated successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function show(CourseSection $courseSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseSection $courseSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson = CourseSection::where(['id' => $id])->first();
        $message = 'Ops, Something went wrong!!';
        $validated_data = $request->validate([
            'title' => "required|string",
            'description' => "required|string",
        ]);
        $lesson->title = $validated_data['title'];
        $lesson->description  = $validated_data['description'];
        $lesson->save();
        if ($lesson != null) {
            $message = 'Section has been updated successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
            // return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseSection  $courseSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseSection $courseSection)
    {
        dd($courseSection);
    }
}

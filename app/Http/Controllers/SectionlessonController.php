<?php

namespace App\Http\Controllers;

use App\Models\Sectionlesson;
use Illuminate\Http\Request;

class SectionlessonController extends Controller
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
    
    public function index($id)
    {
        $lesson = Sectionlesson::where(['id' => $id])->first();
        return view('school.enrollment.main', compact('lesson'));
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
        $validated_data = $request->validate([
            'title' => "required|string",
            'duration' => "required|string",
            'description' => "required|string",
            'url' => "required|url",
            'audio-url' => "string",
            'author' => "required|string",
        ]);
        
        $lesson = Sectionlesson::create([
            "title" => $validated_data['title'],
            "duration" => $validated_data['duration'],
            "description" => $validated_data['description'],
            "video_url" => $validated_data['url'],
            "audio_url" => $validated_data['audio-url'],
            "author" => $validated_data['author'],
            "section" => $id,
        ]);
        if ($lesson != null) {
            $message = 'This course has been updated successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sectionlesson  $sectionlesson
     * @return \Illuminate\Http\Response
     */
    public function show(Sectionlesson $sectionlesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sectionlesson  $sectionlesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $sectionlesson)
    {
        // $lesson = Sectionlesson::where(['id' => $sectionlesson])->first();
        dd($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sectionlesson  $sectionlesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson = Sectionlesson::where(['id' => $id])->first();
        $message = 'Ops, Something went wrong!!';
        $validated_data = $request->validate([
            'title' => "required|string",
            'duration' => "required|string",
            'description' => "required|string",
            'video_url' => "required|url",
            'audio-url' => "string",
            'author' => "required|string",
        ]);
        $lesson->title = $validated_data['title'];
        $lesson->duration  = $validated_data['duration'];
        $lesson->description  = $validated_data['description'];
        $lesson->video_url = $validated_data['video_url'];
        $lesson->audio_url = $validated_data['audio-url'];
        $lesson->author = $validated_data['author'];
        $lesson->save();
        if ($lesson != null) {
            $message = 'Lesson has been updated successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
            // return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sectionlesson  $sectionlesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = 'Ops, Something went wrong!!';
        $feature = Sectionlesson::where('id', $id)->delete();
        if ($feature != null) {
            $message = 'Lesson has been deleted successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\QuestionsComments;
use Illuminate\Http\Request;

class ForumController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Forum::all();
        return view('school.forum.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.forum.ask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = "Oops an error occured";
        $user = $request->user();
        $validated_data = $request->validate([
            'title' => "required",
            'description' => "required"
        ]);


        $forum = Forum::create([
            "title" => $validated_data['title'],
            "description" => $validated_data['description'],
            "user" => $user->id
        ]);

        if ($forum != null) {
            $message = 'Your question has been submitted successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show($forum)
    {
        $comments = QuestionsComments::all();
        $question = Forum::where(['id' => $forum])->first();
        return view('school.forum.show', compact('question', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = 'Ops, Something went wrong!!';
        $feature = Forum::where('id', $id)->delete();
        if ($feature != null) {
            $message = 'This features has been deleted successfully';
            return redirect("/forum")->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }
}

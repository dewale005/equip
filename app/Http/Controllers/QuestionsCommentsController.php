<?php

namespace App\Http\Controllers;

use App\Models\QuestionsComments;
use Illuminate\Http\Request;

class QuestionsCommentsController extends Controller
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
    public function store(Request $request, $id)
    {
        $message = "Oops an error occured";
        $user = $request->user();
        $validated_data = $request->validate([
            'description' => 'required|string'
        ]);

        $payload = [
            'user' => $user->id,
            "comment" => $validated_data['description'],
            "question" => $id
        ];

        $forum = QuestionsComments::create($payload);
        
        if ($forum != null) {
            $message = 'Your question has been submitted successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionsComments  $questionsComments
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionsComments $questionsComments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionsComments  $questionsComments
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionsComments $questionsComments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionsComments  $questionsComments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionsComments $questionsComments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionsComments  $questionsComments
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionsComments $questionsComments)
    {
        //
    }
}

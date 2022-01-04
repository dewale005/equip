<?php

namespace App\Http\Controllers;

use App\Models\Features;
use Illuminate\Http\Request;

class FeaturesController extends Controller
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
        $validated_data = $request->validate([
            "f_title" => 'required'
        ]);
        $feature = Features::create([
            "title" => $validated_data['f_title'],
            "course" => $id
        ]);

        if ($feature != null) {
            $message = 'This features has been added successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = 'Ops, Something went wrong!!';
        $validated_data = $request->validate([
            'title' => 'required'
        ]);
        $feature = Features::where('id', $id)->first();
        $feature->title = $validated_data['title'];
        $feature->save();
        if ($feature != null) {
            $message = 'This features has been updated successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = 'Ops, Something went wrong!!';
        $feature = Features::where('id', $id)->delete();
        if ($feature != null) {
            $message = 'This features has been deleted successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }
}

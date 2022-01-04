<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
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
        $course = Course::where(['id' => $id])->first();
        return view('school.enrollment.show', compact('course'));
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
        $user = $request->user();

        $data = Course::where(['id' => $id])->first();
        $date = date("y-m-d");
        
        $course = $id;
        $exist = Enrollment::where(['student' => $user->id, 'course' => $id])->first();

        // dd($id);

        if ($id !== "1") {
                $message = "This course has not yet started";
                return redirect()->back()->with(session()->flash('alert-danger', $message));
        } else {
            if($exist == null) {
                $enroll = Enrollment::create([
                    'course' => $course,
                    'student' => $user->id,
                ]);
                return redirect()->route('enrollment.lesson', [$course]);;
                // enrollment.lesson
            } else {
                $message = "You have already enrolled for this course";
                return redirect()->back()->with(session()->flash('alert-danger', $message));
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}

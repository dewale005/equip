<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSection;
use App\Models\Features;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseController extends Controller
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
        // $course = Course::all();
        $course = Course::simplePaginate(24);
        return view('school.course.index', compact('course'));
        // view('school.course.index')->render();
    }

    public function manage()
    {
        $course = Course::simplePaginate(24);
        return view('school.course.manage', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teachers::all();
        return view('school.course.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            "title" => 'required',
            "duration" => 'required',
            "description" => 'required',
            "author" => 'required',
            "trailler_url" => 'required|url',
        ]);
        $course = Course::create([
            "title" => $validated_data['title'],
            "duration" => $validated_data['duration'],
            "description" => $validated_data['description'],
            "trailler_url" => $validated_data['trailler_url'],
            'author' => $validated_data['author'],
            "slug" => Str::slug($validated_data['title'])
        ]);
        return redirect()->route('course.edit', [$course->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::where(['slug' => $id])->first();
        return view('school.course.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teachers::all();
        $course = Course::where(['id' => $id])->first();  
        return view('school.course.edit', compact('course', 'teachers',));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $message = 'Ops, Something went wrong!!';
        // $request->validate([
        //     "title" => 'required',
        //     "duration" => 'required',
        //     "author" => 'required',
        //     "description" => 'string',
        //     "thumbnail" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     "trailler_url" => 'required|url',
        //     "start_date" => 'required|date',
        //     "end_date" => 'date',
        // ]);
        $data = $this->handleRequest($request);
        // dd($data);
        $course = Course::where(['id' => $id])->first();
        $course->title = $data['title'];
        $course->description = $data['description'];
        $course->duration = $data['duration'];
        $course->author = $data['author'];
        $course->thumbnail = $data['thumbnail'] == null ? $course->thumbnail : $data['thumbnail'];
        $course->trailler_url = $data['trailler_url'];
        $course->start_date = $data['start_date'];
        $course->end_date = $data['end_date'];
        $course->save();

        if ($course != null) {
            $message = 'This course has been updated successfully';
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
        $feature = Course::where('id', $id)->delete();
        if ($feature != null) {
            $message = 'This features has been deleted successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }

    private function handleRequest(Request $request)
    {
        $data = $request->all();

        if($request->get('thumbnail') == null) {
            $data['thumbnail'] = null;
        }

        // if ($request->hasFile('thumbnail')) {
        //     $response = cloudinary()->upload($request->file('thumbnail')->getRealPath(), ['folder' => 'course-thumbnail'])->getSecurePath();
        //     $data['thumbnail'] = $response;
        // }

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            $data['thumbnail'] = $name;
        }

        return $data;
    }
}

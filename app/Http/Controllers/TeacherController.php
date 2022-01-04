<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Teachers;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    protected $uploadPath;

    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->uploadPath = public_path('images/uploads');
    }

    public function index()
    {
        $teachers = Teachers::paginate(12);
        return view('school.teacher.index', compact('teachers'));
    }

    public function show($id)
    {
        $teacher = Teachers::with('courses')->where(['slug' => $id])->first();
        return view('school.teacher.show', compact('teacher'));
    }

    public function manage()
    {
        $teachers = Teachers::paginate(12);
        return view('school.teacher.manage', compact('teachers'));
    }

    public function create()
    {
        return view('school.teacher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required',
            "description" => 'required',
            "full_name" => 'required',
            "avatar" => 'required',
            "rate" => 'required',
            'facebook' => 'required|url',
            'instagram' => 'required|url',
        ]);
        $data = $this->handleRequest($request);
        Teachers::create([
            "title" => $data['title'],
            "description" => $data['description'],
            "full_name" => $data['full_name'],
            "avatar" => $data['avatar'],
            "slug" => Str::slug($data['full_name']),
            "rating" => $data['rate'],
            'facebook' => $data['facebook'],
            'instagram' => $data['instagram'],
        ]);
        return redirect()->route('teachers.manage');
    }

    public function edit($id)
    {
        $teachers = Teachers::where(['id' => $id])->first();
        return view('school.teacher.edit', compact('teachers'));
    }

    public function update(Request $request, $id)
    {
        $message = 'Ops, Something went wrong!!';
        $request->validate([
            "title" => 'required',
            "description" => 'required',
            "full_name" => 'required',
            "avatar" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "rate" => 'required',
            'facebook' => 'required|url',
            'instagram' => 'required|url',
        ]);

        $data = $this->handleRequest($request);
        $teacher = Teachers::where(['id' => $id])->first();
        $teacher->title = $data['title'];
        $teacher->description = $data['description'];
        $teacher->full_name = $data['full_name'];
        $teacher->avatar = $data['avatar'] == null ? $teacher->avatar : $data['avatar'];
        $teacher->rating = $data['rate'];
        $teacher->facebook = $data['facebook'];
        $teacher->instagram = $data['instagram'];
        $teacher->save();

        if ($teacher != null) {
            $message = 'Your profile has been updated successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }

    private function handleRequest(Request $request)
    {
        $data = $request->all();

        if($request->get('avatar') == null) {
            $data['avatar'] = null;
        }

        // if ($request->hasFile('avatar')) {

        //     $response = cloudinary()->upload($request->file('avatar')->getRealPath(), ['folder' => 'course-avatar'])->getSecurePath();

        //     $data['avatar'] = $response;
        // }
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            $data['avatar'] = $name;
            // $this->save();
    
            // return back()->with('success','Image Upload successfully');
        }

        return $data;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user = User::orderBy('created_at', 'desc')->paginate(100);
        return view('user.list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('privacy.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Request $request)
    {
        $user = $request->user();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $message = 'Ops, Something went wrong!!';
        $user = $request->user();
        $validatedData = $request->validate([
            'address' => 'required',
            'state' => 'required',
            'age_range' => 'required',
            'gender' => 'required',
            'employment' => 'required',
            'local_govt' => 'required',
        ]);
        $user->bio = $request->get('bio');
        $user->address = $validatedData['address'];
        $user->address2 = $request->get('address2');
        $user->state = $validatedData['state'];
        $user->age_range = $validatedData['age_range'];
        $user->employment = $validatedData['employment'];
        $user->gender = $validatedData['gender'];
        $user->local_govt = $validatedData['local_govt'];
        $user->save();
        if ($user != null) {
            $message = 'Your profile has been updated successfully';
            return redirect("/")->with(session()->flash('alert-success', $message));
            // return redirect()->back()->with(session()->flash('alert-success', $message));
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
        $feature = User::where('id', $id)->delete();
        if ($feature != null) {
            $message = 'User has been deleted successfully';
            return redirect()->back()->with(session()->flash('alert-success', $message));
        }
        return redirect()->back()->with(session()->flash('alert-danger', $message));
    }

    public function export(Request $request)
{
    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=users.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );

    $validatedData = $request->validate([
        'start_date' => 'required',
        'end_date' => 'required',
    ]);

    $reviews = User::select()->where('created_at','>=',$validatedData['start_date'])->where('created_at','<=', $validatedData['end_date'])->get();
    $columns = array('First Name', 'Last Name', 'Email', 'Phone number', 'Gender', 'State', 'Age', 'Date Joined');

    $callback = function() use ($reviews, $columns)
    {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach($reviews as $review) {
            fputcsv($file, array($review->first_name, $review->last_name, $review->email, $review->phone_number, $review->gender, $review->state, $review->age_range, $review->created_at));
        }
        fclose($file);
    };
    return Response::stream($callback, 200, $headers);
}
}

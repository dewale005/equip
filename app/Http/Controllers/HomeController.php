<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified', 'prevent-back-history']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();
        // return view('user.edit', compact('user'));
        return view('user.home', compact('user'));
    }

    public function show()
    {
        return view('auth.verify');
    }



    public function edit(Request $request)
    {
        $user = $request->user();
        return view('user.edit', compact('user'));
    }
}

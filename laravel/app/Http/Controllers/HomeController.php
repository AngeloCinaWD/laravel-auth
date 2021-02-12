<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateUserIcon(Request $request) {
      // $data = $request -> all();
      $request -> validate ([
        'icon' => 'required|file'
      ]);
      $image = $request -> file('icon');
      $ext = $image -> getClientOriginalExtension();
      $name = rand(100000, 999999).'_'.time();
      $destFile = $name.'.'.$ext;
      $file = $image -> storeAs('icon', $destFile, 'public');
      // dd($data, $image);
      // dd($image, $ext, $name, $destFile);
      return redirect() -> back();
    }
}

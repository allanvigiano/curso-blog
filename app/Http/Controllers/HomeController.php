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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbList = json_encode([
            ["title"=> "Home", "url"=> ""],
        ]);
        // dd(($breadcrumbList));
        return view('home', ["breadcrumbList"=> $breadcrumbList]);
        return view('home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class AdminController extends Controller
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
            ["title"=> "Admin", "url"=> ""],
        ]);
        $countArticles = Article::count(); 
        $countUsers = User::count(); 
        $countAuthors = User::where('author', '=', 'Y')->count(); 
        $countAdmins = User::where('admin', '=', 'Y')->count(); 
        return view('admin', [
            "breadcrumbList"=> $breadcrumbList,
            "countArticles" => $countArticles,
            "countUsers" => $countUsers,
            "countAuthors" => $countAuthors,
            "countAdmins" => $countAdmins,
        ]);
    }
}

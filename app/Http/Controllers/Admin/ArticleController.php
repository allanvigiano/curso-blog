<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbList = json_encode([
            ["title"=> "Admin", "url"=> route("admin")], 
            ["title"=> "Lista de Artigos", "url"=> ""], 
        ]);

        $articleList = Article::listArticles(5);

        return view('admin.articles.index', [
            "breadcrumbList"=> $breadcrumbList,
            "articleList"=> $articleList
        ]);
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
    public function store(Request $request)
    {
        $data = $request->all();
        
        $validation = \Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'date_time' => 'required',
            'content' => 'required'
        ]);

        if($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        else {
            Article::create($data);
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        $article->date_time = substr($article->date_time, 0, 10);
        return $article;
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
        $data = $request->all();

        $validation = \Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'date_time' => 'required',
            'content' => 'required'
        ]);

        if($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        else {
            Article::find($id)->update($data);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back();
    }
}

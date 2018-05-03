<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\User;

class AuthorController extends Controller
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
            ["title"=> "Lista de Autores", "url"=> ""], 
        ]);

        $modelList = User::select('id', 'name', 'email')->where('author', '=', 'Y')->paginate(5);

        // dd(($breadcrumbList));
        return view('admin.authors.index', [
            "breadcrumbList"=> $breadcrumbList,
            "modelList"=> $modelList
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        else {
            $data['password'] = bcrypt($data['password']);
            User::create($data);
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
        return User::find($id);
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

        if (isset($data['password']) || $data['password'] != "") {

            $validation = \Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => ['required','string','email','max:255', Rule::unique('users')->ignore($id)],
                'password' => 'required|string|min:6',
            ]);
            $data['password'] = bcrypt($data['password']);
        }
        else {
            $validation = \Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => ['required','string','email','max:255', Rule::unique('users')->ignore($id)],
            ]);
            unset($data['password']);
        }


        if($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        else {
            User::find($id)->update($data);
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
        User::find($id)->delete();
        return redirect()->back();
    }
}

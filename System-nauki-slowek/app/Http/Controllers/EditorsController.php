<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Redirect;
use Illuminate\Http\Request;
use App\Roles;
use App\Categories;
use App\Editors;
use App\Languages;
use App\Results;
use App\Sets;
use App\Subcategories;
use App\User_roles;
use App\User;
use Illuminate\Support\Facades\Auth;

class EditorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $editors = Editors::paginate(10);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Editors\adminEditors')->with('editors', $editors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $subcategories = Subcategories::all();
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Editors\createEditors')->with('users', $users)->with('subcategories', $subcategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $editors = new Editors();   
        $editors->users_id = $request->get('users');
        $editors->subcategories_id = $request->get('subcategories');
        $editors->supereditor = 0;
        $editors->save();


        
        

        return redirect('/editors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editors = Editors::find($id);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Editors\showMoreEditors')->with('editors', $editors);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editors = Editors::find($id);
        $users = User::all();
        $subcategories = Subcategories::all();
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Editors\updateEditors')->with('editors', $editors)->with('users', $users)->with('subcategories', $subcategories);
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
        $editors = Editors::find($id);
        

        $editors->users_id = $request->get('users');
        $editors->subcategories_id = $request->get('subcategories');
        $editors->supereditor = 0;
        $editors->save();


        
        

        return redirect('/editors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editors = Editors::find($id);
        $editors->delete(); 
        return redirect('/editors');
    }
}

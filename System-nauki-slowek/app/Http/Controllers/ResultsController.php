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
use App\Http\Requests\StoreFormValidation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $results = Results::paginate(10);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Results\adminResults')->with('results', $results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sets = Sets::all();
        $users = User::all();
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Results\createResults')->with('sets', $sets)->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'resultsDate' => 'required',
            'resultsPercent' => 'required|numeric',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $results = new Results(); 
        $results->sets_id = $request->get('sets');
        $results->users_id = $request->get('users');  
        $results->date = $request->input('resultsDate');
        $results->percent = $request->input('resultsPercent');
       
        
        $results->save();


        
        

        return redirect('/results');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = Results::find($id);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Results\showMoreResults')->with('results', $results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = results::find($id);
        $sets = Sets::all();
        $users = User::all();
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Results\updateResults')->with('results', $results)->with('sets', $sets)->with('users', $users);
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
        $v = Validator::make($request->all(), [
            'resultsDate' => 'required',
            'resultsPercent' => 'required|numeric',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $results = Results::find($id);
        

        $results->sets_id = $request->get('sets');
        $results->users_id = $request->get('users');  
        $results->date = $request->input('resultsDate');
        $results->percent = $request->input('resultsPercent');
       
        
        $results->save();


        
        

        return redirect('/results');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $results = Results::find($id);
        $results->delete();
        return redirect('/results');
    }
}

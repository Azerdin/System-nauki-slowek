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
use Illuminate\Support\Facades\Auth;

class SetsUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id = Auth::id();
        $sets = Sets::where([
            ['users_id', '=', $id],
            ['private', '=', '1'],
            ])->get();

        return view('Frontend\Sets\adminSetsUser')->with('sets', $sets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Languages::all();
        $subcategories = Subcategories::all();
        
        return view('Frontend\Sets\createSetsUser')->with('languages', $languages)->with('subcategories', $subcategories);
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
            'setsName' => 'required',
            'setsWords' => 'required',
            'setsNumber_of_words' => 'required|numeric',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $sets = new Sets();   
        $sets->name = $request->input('setsName');
        $sets->words = $request->input('setsWords');
        $sets->number_of_words = $request->input('setsNumber_of_words');
        $sets->private = 1;
        $sets->languages1_id = $request->get('languages1');
        $sets->languages2_id = $request->get('languages2');
        $sets->subcategories_id = $request->get('subcategories');
        $sets->users_id = Auth::id();
        $sets->save();    

        return redirect('/setsUser');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sets = Sets::find($id);

        return view('Frontend\Sets\showMoreSetsUser')->with('sets', $sets);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sets = Sets::find($id);
        $languages = Languages::all();
        $subcategories = Subcategories::all();
        
        return view('Frontend\Sets\updateSetsUser')->with('languages', $languages)->with('subcategories', $subcategories)->with('sets', $sets);
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
            'setsName' => 'required',
            'setsWords' => 'required',
            'setsNumber_of_words' => 'required|numeric',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $sets = Sets::find($id);   
        $sets->name = $request->input('setsName');
        $sets->words = $request->input('setsWords');
        $sets->number_of_words = $request->input('setsNumber_of_words');
        $sets->private = 1;
        $sets->languages1_id = $request->get('languages1');
        $sets->languages2_id = $request->get('languages2');
        $sets->subcategories_id = $request->get('subcategories');
        $sets->users_id = Auth::id();
        $sets->save();

        return redirect('/setsUser');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sets = Sets::find($id);
        if(Results::where('sets_id', '=', $sets->id)->count() == 0)
        {
            $sets->delete();
            return redirect('/setsUser');
        }
        
        
        return redirect('/setsUser')->withErrors('Nie można usunąć rekordu!');
    }
}

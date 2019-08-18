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

class SetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        {
            $sets = Sets::all();
            return view('backend\Sets\adminSetsAdministrator')->with('sets', $sets);
        }
        elseif(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 2],])->count() != 0)
        {
            $sets = Sets::where('users_id', '=', Auth::id())->get();
            $editors = Editors::where('users_id', '=', Auth::id())->get();
            return view('backend\Sets\adminSetsSuperRedaktor')->with('sets', $sets)->with('editors', $editors);
        }
        elseif(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 3],])->count() != 0)
        {
            $editors = Editors::where('users_id', '=', Auth::id())->get();
            $sets = Sets::all();
            $subcategories = Subcategories::all();
            return view('backend\Sets\adminSetsRedaktor')->with('sets', $sets)->with('editors', $editors)->with('subcategories', $subcategories);
        }
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
        $users = User::all();
        $sets = Sets::all();
        $editors = Editors::where('users_id', '=', Auth::id())->get();
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
            return view('backend\Sets\createSetsAdministrator')->with('languages', $languages)->with('subcategories', $subcategories)->with('users', $users)->with('sets', $sets)->with('editors', $editors);
        elseif(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 2],])->count() != 0)
            return view('backend\Sets\createSetsSuperRedaktor')->with('languages', $languages)->with('subcategories', $subcategories)->with('users', $users)->with('sets', $sets)->with('editors', $editors);
        elseif(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 3],])->count() != 0)
            return view('backend\Sets\createSetsRedaktor')->with('languages', $languages)->with('subcategories', $subcategories)->with('users', $users)->with('sets', $sets)->with('editors', $editors);
        
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
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        {
                $sets->private = $request->input('setsPrivate');
                $sets->validated = $request->input('setsValidated');
        }
        elseif(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 3],])->count() != 0)
        {
            $sets->private = 0;
        }
        elseif(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 2],])->count() != 0)
        {
            $sets->private = $request->input('setsPrivate');
            $sets->validated = $request->input('setsValidated');
        }
        $sets->languages1_id = $request->get('languages1');
        $sets->languages2_id = $request->get('languages2');
        $sets->subcategories_id = $request->get('subcategories');
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
            $sets->users_id = Auth::id();
        else
            $sets->users_id = Auth::id();
        $sets->save();    

        return redirect('/sets');
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
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Sets\showMoreSets')->with('sets', $sets);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languages = Languages::all();
        $subcategories = Subcategories::all();
        $users = User::all();
        $sets = Sets::find($id);
        $editors = Editors::where('users_id', '=', Auth::id())->get();
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Sets\updateSetsAdministrator')->with('languages', $languages)->with('subcategories', $subcategories)->with('users', $users)->with('sets', $sets)->with('editors', $editors);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 2],])->count() != 0)
        return view('backend\Sets\updateSetsSuperRedaktor')->with('languages', $languages)->with('subcategories', $subcategories)->with('users', $users)->with('sets', $sets)->with('editors', $editors);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 3],])->count() != 0)
        return view('backend\Sets\updateSetsRedaktor')->with('languages', $languages)->with('subcategories', $subcategories)->with('users', $users)->with('sets', $sets)->with('editors', $editors);
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
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        {
                $sets->private = $request->input('setsPrivate');
                $sets->validated = $request->input('setsValidated');
        }
        elseif(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 3],])->count() != 0)
        {
            $sets->private = 0;
        }
        elseif(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 2],])->count() != 0)
        {
            $sets->private = $request->input('setsPrivate');
            $sets->validated = $request->input('setsValidated');
        }
        $sets->languages1_id = $request->get('languages1');
        $sets->languages2_id = $request->get('languages2');
        $sets->subcategories_id = $request->get('subcategories');
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
            $sets->users_id = Auth::id();
        else
            $sets->users_id = Auth::id();
        $sets->save();    

        return redirect('/sets');

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
            return redirect('/sets');
        }
        
        
        return redirect('/sets')->withErrors('Nie można usunąć rekordu!');
    }
}

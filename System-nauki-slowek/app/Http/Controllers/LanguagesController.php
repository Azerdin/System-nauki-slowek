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

class LanguagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $languages = Languages::paginate(10);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Languages\adminLanguages')->with('languages', $languages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Languages\createLanguages');
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
            'languagesName' => 'required',
            'languagesSymbol' => 'required',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $languages = new Languages();   
        $languages->name = $request->input('languagesName');
        $languages->symbol = $request->input('languagesSymbol');
        $languages->save();

        return redirect('/languages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $languages = Languages::find($id);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Languages\showMoreLanguages')->with('languages', $languages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languages = Languages::find($id);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Languages\updateLanguages')->with('languages', $languages);
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
            'languagesName' => 'required',
            'languagesSymbol' => 'required',
        ]);
        
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $languages = Languages::find($id);
        

        $languages->name = $request->input('languagesName');
        $languages->symbol = $request->input('languagesSymbol');
    
        $languages->save();

        return redirect('/languages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $languages = Languages::find($id);
        if(Sets::where('languages1_id', '=', $languages->id)->count() == 0 && Sets::where('languages2_id', '=', $languages->id)->count() == 0)
        {
            $languages->delete();
            return redirect('/languages');
        } 
        
        return redirect('/languages')->withErrors('Nie możesz usunąć tego rekordu');
    }
}

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

class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $subcategories = Subcategories::paginate(10);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Subcategories\adminSubcategories')->with('subcategories', $subcategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Subcategories\createSubcategories')->with('categories', $categories);
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
            'subcategoriesName' => 'required',
            'subcategoriesDescription' => 'required',
            'subcategoriesPicture_file_name' => 'required',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $subcategories = new Subcategories();   
        $subcategories->name = $request->input('subcategoriesName');
        $subcategories->description = $request->input('subcategoriesDescription');
        $subcategories->picture_file_name = $request->input('subcategoriesPicture_file_name');
        $subcategories->categories_id = $request->get('categories');
        $subcategories->save();


        
        

        return redirect('/subcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategories = Subcategories::find($id);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Subcategories\showMoreSubcategories')->with('subcategories', $subcategories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategories = Subcategories::find($id);
        $categories = Categories::all();
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\Subcategories\updateSubcategories')->with('subcategories', $subcategories)->with('categories', $categories);
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
            'subcategoriesName' => 'required',
            'subcategoriesDescription' => 'required',
            'subcategoriesPicture_file_name' => 'required',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $subcategories = Subcategories::find($id);
        

        $subcategories->name = $request->input('subcategoriesName');
        $subcategories->description = $request->input('subcategoriesDescription');
        $subcategories->picture_file_name = $request->input('subcategoriesPicture_file_name');
        $subcategories->categories_id = $request->get('categories');
        $subcategories->save();

        return redirect('/subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategories = Subcategories::find($id);
        $subcategories->delete();
        
        return redirect('/subcategories');
    }
}

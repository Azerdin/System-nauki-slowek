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


class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $categories = Categories::paginate(10);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
            return view('backend\Categories\adminCategories')->with('categories', $categories);

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
            return view('backend\Categories\createCategories');
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
            'categoriesName' => 'required',
            'categoriesDescription' => 'required',
            'categoriesPicture_file_name' => 'required',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $categories = new Categories();   
        $categories->name = $request->input('categoriesName');
        $categories->description = $request->input('categoriesDescription');
        $categories->picture_file_name = $request->input('categoriesPicture_file_name');
        $categories->save();
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Categories::find($id);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
            return view('backend\Categories\showMoreCategories')->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::find($id);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
            return view('backend\Categories\updateCategories')->with('categories', $categories);
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
            'categoriesName' => 'required',
            'categoriesDescription' => 'required',
            'categoriesPicture_file_name' => 'required',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $categories = Categories::find($id);
        

        $categories->name = $request->input('categoriesName');
        $categories->description = $request->input('categoriesDescription');
        $categories->picture_file_name = $request->input('categoriesPicture_file_name');
        $categories->save();

        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::find($id);
        if(Subcategories::where('categories_id', '=', $categories->id)->count() == 0)
        {
            $categories->delete();
            return redirect('/categories');
        } 

        return redirect('/categories')->withErrors('Nie możesz usunąc rekordu!');
        
    }
}

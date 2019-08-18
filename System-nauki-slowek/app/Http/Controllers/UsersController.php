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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
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
        $users = User::paginate(10);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
            return view('backend\User\adminUsers')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\User\createUsers')->with('roles', $roles);
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
            'usersName' => 'required',
            'usersEmail' => 'required|email',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        
        $users = new User();   
        $users->name = $request->input('usersName');
        $users->email = $request->input('usersEmail');
    
        $roles_id = $request->get('roles');
        $users->save();
        $users->roles()->attach($roles_id, ['users_id' => $users->id]);
        $users->save();


        
        

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\User\showMoreUser')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $users = User::find($id);
        $roles = Roles::all();
        $user_roles = User_roles::all();
        $checked = false;
        if(User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
        return view('backend\User\updateUsers')->with('users', $users)->with('roles', $roles)->with('user_roles', $user_roles)->with('checked', $checked);
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
            'usersName' => 'required',
            'usersEmail' => 'required|email',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $users = User::find($id);
        

        $users->name = $request->input('usersName');
        $users->email = $request->input('usersEmail');
        //$pracownik->adres_id = $request->get('adres_id');
        $roles_id = $request->get('roles');
        $users->save();
        $users->roles()->detach();
        $users->roles()->attach($roles_id, ['users_id' => $users->id]);
        $users->save();
    
        $users->save();

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        if(Sets::where('users_id', '=', $users->id)->count() == 0    && 
           Results::where('users_id', '=', $users->id)->count() == 0 && 
           Editors::where('users_id', '=', $users->id)->count() == 0)
           {
                $users->delete();
                return redirect('/users');
           }
        return redirect('/users')->withErrors('Nie można usunąć rekordu!');
        
        
    }
}

<?php

namespace App\Http\Controllers;

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

class RetriveController extends Controller
{
    public function categoriesRetrive($id)
    {
        $categories = Categories::withTrashed()->where('id', $id)->restore();
        return redirect('/bin');
    }
    public function subcategoriesRetrive($id)
    {
        $subcategories = Subcategories::withTrashed()->where('id', $id)->restore();
        return redirect('/bin');
    }
    public function editorsRetrive($id)
    {
        $editors = Editors::withTrashed()->where('id', $id)->restore();
        return redirect('/bin');
    }
    public function languagesRetrive($id)
    {
        $languages = Languages::withTrashed()->where('id', $id)->restore();
        return redirect('/bin');
    }
    public function resultsRetrive($id)
    {
        $results = Results::withTrashed()->where('id', $id)->restore();
        return redirect('/bin');
    }
    public function rolesRetrive($id)
    {
        $roles = Roles::withTrashed()->where('id', $id)->restore();
        return redirect('/bin');
    }
    public function setsRetrive($id)
    {
        $sets = Sets::withTrashed()->where('id', $id)->restore();
        return redirect('/bin');
    }
    public function usersRetrive($id)
    {
        $users = User::withTrashed()->where('id', $id)->restore();
        return redirect('/bin');
    }
}

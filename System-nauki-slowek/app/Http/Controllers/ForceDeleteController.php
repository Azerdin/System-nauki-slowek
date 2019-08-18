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

class ForceDeleteController extends Controller
{
    public function categoriesForceDelete($id)
    {
        $categories = Categories::withTrashed()->where('id', $id)->forceDelete();
        return redirect('/bin');
    }
    public function subcategoriesForceDelete($id)
    {
        $subcategories = Subcategories::withTrashed()->where('id', $id)->forceDelete();
        return redirect('/bin');
    }
    public function editorsForceDelete($id)
    {
        $editors = Editors::withTrashed()->where('id', $id)->forceDelete();
        return redirect('/bin');
    }
    public function languagesForceDelete($id)
    {
        $languages = Languages::withTrashed()->where('id', $id)->forceDelete();
        return redirect('/bin');
    }
    public function resultsForceDelete($id)
    {
        $results = Results::withTrashed()->where('id', $id)->forceDelete();
        return redirect('/bin');
    }
    public function rolesForceDelete($id)
    {
        $roles = Roles::withTrashed()->where('id', $id)->forceDelete();
        return redirect('/bin');
    }
    public function setsForceDelete($id)
    {
        $sets = Sets::withTrashed()->where('id', $id)->forceDelete();
        return redirect('/bin');
    }
    public function usersForceDelete($id)
    {
        $users = User::withTrashed()->where('id', $id)->forceDelete();
        return redirect('/bin');
    }
}

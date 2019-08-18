<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
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

class FronController extends Controller
{
   
    public function showCategories()
    {
        $categories = Categories::all();
        return view('\Frontend\welcome')->with('categories', $categories);
    }
    public function showSubcategories($id)
    {
        $subcategories = Subcategories::where('categories_id', '=', $id)->get();
        return view('\Frontend\showSubcategories')->with('subcategories', $subcategories);
    }
    public function showSets($id)
    {
        $sets1 = Sets::where([['subcategories_id', '=', $id],['users_id', '=', Auth::id()],['private', '=','1'],])->get();
        $sets2 = Sets::where([['subcategories_id', '=', $id],['private', '=','0'],])->get();
        return view('\Frontend\showSets')->with('sets1', $sets1)->with('sets2', $sets2);
    }
    public function options($id)
    {
        $sets = Sets::find($id);
        return view('\Frontend\showOptions')->with('sets', $sets);
    }
    public function optionsLearning($id)
    {
        $sets = Sets::find($id);
        return view('\Frontend\learning\optionsLearning')->with('sets', $sets);
    }
    public function optionsChecking($id)
    {
        $sets = Sets::find($id);
        return view('\Frontend\learning\optionsChecking')->with('sets', $sets);
    }
    public function showResults()
    {
        $id = Auth::id();
        $results = Results::where('users_id', '=', $id)->get();
       /* if($results->count() !=0)
            foreach($results as $r)
                $dataPoints[] = array("y" => $r->percent, "label" => $r->date);*/
        
        return view('\Frontend\Results\showResults')->with('results', $results)/*->with('dataPoints', $dataPoints)*/;
    }
    public function showWords($id)
    {
        $this->points = 0;
        $sets = Sets::find($id);
        $words = explode("\n", $sets->words);
        foreach($words as $w)
        {
            $temp = $w;
            $word = explode(';', $temp);
            $languages1Array[] = trim($word[0]);
            $languages2Array[] = trim($word[1]);
        }

        return view('\Frontend\learning\showWords')->with('languages1Array', $languages1Array)->with('languages2Array', $languages2Array)->with('sets', $sets);

    }
    public function learning1L1($id)
    {
        $sets = Sets::find($id);
        $words = explode("\n", $sets->words);
        foreach($words as $w)
        {
            $temp = $w;
            $word = explode(';', $temp);
            $languages1Array[] = trim($word[0]);
            $languages2Array[] = trim($word[1]);
        }
            return view('\Frontend\learning\learning1L1')->with('languages1Array', $languages1Array)->with('languages2Array', $languages2Array)->with("sets", $sets)->with('words', $words);
    }
    public function learning1L2($id)
    {
        $sets = Sets::find($id);
        $words = explode("\n", $sets->words);
        foreach($words as $w)
        {
            $temp = $w;
            $word = explode(';', $temp);
            $languages1Array[] = trim($word[0]);
            $languages2Array[] = trim($word[1]);
        }
            return view('\Frontend\learning\learning1L2')->with('languages1Array', $languages1Array)->with('languages2Array', $languages2Array)->with("sets", $sets)->with('words', $words);
    }
    public function checking1L1($id)
    {
        $sets = Sets::find($id);
        $words = explode("\n", $sets->words);
        foreach($words as $w)
        {
            $temp = $w;
            $word = explode(';', $temp);
            $languages1Array[] = trim($word[0]);
            $languages2Array[] = trim($word[1]);
        }
            return view('\Frontend\learning\checking1L1')->with('languages1Array', $languages1Array)->with('languages2Array', $languages2Array)->with("sets", $sets)->with('words', $words);
    }
    public function checking1L2($id)
    {
        $sets = Sets::find($id);
        $words = explode("\n", $sets->words);
        foreach($words as $w)
        {
            $temp = $w;
            $word = explode(';', $temp);
            $languages1Array[] = trim($word[0]);
            $languages2Array[] = trim($word[1]);
        }
            return view('\Frontend\learning\checking1L2')->with('languages1Array', $languages1Array)->with('languages2Array', $languages2Array)->with("sets", $sets)->with('words', $words);
    }
    public function algorithm(Request $request, $id)
    {
        $i = 0;
        $notEquals = true;
        $points = 0;
        $sets = Sets::find($id);
        $words = explode("\n", $sets->words);
        foreach($words as $w)
        {
            $temp = $w;
            $word = explode(';', $temp);
            $languages1Array[] = trim($word[0]);
            $languages2Array[] = trim($word[1]);
        }
        
        $words = $request->get('words');
        foreach($words as $w)
        {
            if($w == $languages2Array[$i])
            {
                $correctArray[] = 1;
                $points++;
            }
            else
            {
                $correctArray[] = 0;
            }
            $i++;
        }
        $percent = $points / count($correctArray) * 100;
        return view('\Frontend\learning\learning1L1Result')->with('languages1Array', $languages1Array)->with('languages2Array', $languages2Array)
        ->with('correctArray', $correctArray)
        ->with('points', $points)
        ->with('words', $words)
        ->with('percent', $percent)
        ->with('sets', $sets);

    }
    public function algorithm1(Request $request, $id)
    {
        {
            $i = 0;
            $notEquals = true;
            $points = 0;
            $sets = Sets::find($id);
        $words = explode("\n", $sets->words);
        foreach($words as $w)
        {
            $temp = $w;
            $word = explode(';', $temp);
            $languages1Array[] = trim($word[0]);
            $languages2Array[] = trim($word[1]);
        }
            
            $words = $request->get('words');
            foreach($words as $w)
            {
                if($w == $languages1Array[$i])
                {
                    $correctArray[] = 1;
                    $points++;
                }
                else
                {
                    $correctArray[] = 0;
                }
                $i++;
            }
            $percent = $points / count($correctArray) * 100;
           /* if(Auth::check())
            {
                $results = new Results();
                $results->sets_id = $id;
                $results->users_id = Auth::id();
                $results->percent = $percent;
                $results->date = date('Y-m-d');
                $results->save();
            }*/
            return view('\Frontend\learning\learning1L2Result')->with('languages1Array', $languages1Array)->with('languages2Array', $languages2Array)
            ->with('correctArray', $correctArray)
            ->with('points', $points)
            ->with('words', $words)
            ->with('percent', $percent)
            ->with('sets', $sets);
    
        }
    }
    public function algorithmChecking(Request $request, $id)
    {
        $i = 0;
        $notEquals = true;
        $points = 0;
        $sets = Sets::find($id);
        $words = explode("\n", $sets->words);
        foreach($words as $w)
        {
            $temp = $w;
            $word = explode(';', $temp);
            $languages1Array[] = trim($word[0]);
            $languages2Array[] = trim($word[1]);
        }
        
        $words = $request->get('words');
        foreach($words as $w)
        {
            if($w == $languages2Array[$i])
            {
                $correctArray[] = 1;
                $points++;
            }
            else
            {
                $correctArray[] = 0;
            }
            $i++;
        }
        $percent = $points / count($correctArray) * 100;
        if(Auth::check())
            {
                $results = new Results();
                $results->sets_id = $id;
                $results->users_id = Auth::id();
                $results->percent = $percent;
                $results->date = date('Y-m-d H:i:s');
                $results->save();
            }
        return view('\Frontend\learning\learning1L1Result')->with('languages1Array', $languages1Array)->with('languages2Array', $languages2Array)
        ->with('correctArray', $correctArray)
        ->with('points', $points)
        ->with('words', $words)
        ->with('percent', $percent)
        ->with('sets', $sets);

    }
    public function algorithmChecking1(Request $request, $id)
    {
        {
            $i = 0;
            $notEquals = true;
            $points = 0;
            $sets = Sets::find($id);
            $words = explode("\n", $sets->words);
            foreach($words as $w)
            {
                $temp = $w;
                $word = explode(';', $temp);
                $languages1Array[] = trim($word[0]);
                $languages2Array[] = trim($word[1]);
            }
            $words = $request->get('words');
            foreach($words as $w)
            {
                if($w == $languages1Array[$i])
                {
                    $correctArray[] = 1;
                    $points++;
                }
                else
                {
                    $correctArray[] = 0;
                }
                $i++;
            }
            $percent = $points / count($correctArray) * 100;
            if(Auth::check())
            {
                $results = new Results();
                $results->sets_id = $id;
                $results->users_id = Auth::id();
                $results->percent = $percent;
                $results->date = date('Y-m-d H:i:s');
                $results->save();
            }
            return view('\Frontend\learning\learning1L2Result')->with('languages1Array', $languages1Array)->with('languages2Array', $languages2Array)
            ->with('correctArray', $correctArray)
            ->with('points', $points)
            ->with('words', $words)
            ->with('percent', $percent)
            ->with('sets', $sets);
    
        }
    }
}

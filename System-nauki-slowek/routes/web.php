<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend
Route::get('/', 'FronController@showCategories')->name('welcome');
Route::get('/choiceSubcategories{id}', 'FronController@showSubcategories')->name('choiceSubcategories');
Route::get('/choiceSets{id}', 'FronController@showSets')->name('choiceSets');
Route::get('/choiceOptions{id}', 'FronController@options')->name('choiceOptions');
Route::get('/optionsLearning{id}', 'FronController@optionsLearning')->name('optionsLearning');
Route::get('/optionsChecking{id}', 'FronController@optionsChecking')->name('optionsChecking');
Route::get('/showWords{id}', 'FronController@showWords')->name('showWords');
Route::get('/learning1L1{id}', 'FronController@learning1L1')->name('learning1L1');
Route::get('/learning1L2{id}', 'FronController@learning1L2')->name('learning1L2');
Route::get('/checking1L1{id}', 'FronController@checking1L1')->name('checking1L1');
Route::get('/checking1L2{id}', 'FronController@checking1L2')->name('checking1L2');
Route::post('/algorithm/{id}', 'FronController@algorithm')->name('algorithm');
Route::post('/algorithm1/{id}', 'FronController@algorithm1')->name('algorithm1');
Route::post('/algorithmChecking/{id}', 'FronController@algorithmChecking')->name('algorithmChecking');
Route::post('/algorithmChecking1/{id}', 'FronController@algorithmChecking1')->name('algorithmChecking1');
Auth::routes();
Route::get('/showResultsUser', 'FronController@showResults')->name('showResultsUser');
Route::resource('users', 'UsersController');
Route::resource('roles', 'RolesController');
Route::resource('categories', 'CategoriesController');
Route::resource('subcategories', 'SubcategoriesController');
Route::resource('languages', 'LanguagesController');
Route::resource('sets', 'SetsController');
Route::resource('results', 'ResultsController');
Route::resource('editors', 'EditorsController');
Route::resource('setsUser', 'SetsUserController');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeBackEnd', 'HomeController@indexBackEnd')->name('homeBackEnd');
Route::get('/bin', function()
{

    $categories = App\Categories::onlyTrashed()->get();
    $subcategories = App\Subcategories::onlyTrashed()->get();
    $editors = App\Editors::onlyTrashed()->get();
    $languages = App\Languages::onlyTrashed()->get();
    $results = App\Results::onlyTrashed()->get();
    $roles = App\Roles::onlyTrashed()->get();
    $sets = App\Sets::onlyTrashed()->get();
    $users = App\User::onlyTrashed()->get();
    if(App\User_roles::where([['users_id', '=', Auth::id()],['roles_id', '=', 1],])->count() != 0)
    return view('backend\bin')->with('categories', $categories)
                              ->with('subcategories', $subcategories)
                              ->with('editors', $editors)
                              ->with('languages', $languages)
                              ->with('results', $results)
                              ->with('roles', $roles)
                              ->with('sets', $sets)
                              ->with('users', $users);

})->name('showTrash');
Route::get('/retriveCategories/{id}', 'RetriveController@categoriesRetrive')->name('retriveCategories');
Route::get('/retriveSubcategories/{id}', 'RetriveController@subcategoriesRetrive')->name('retriveSubcategories');
Route::get('/retriveEditors/{id}', 'RetriveController@editorsRetrive')->name('retriveEditors');
Route::get('/retriveLanguages/{id}', 'RetriveController@languagesRetrive')->name('retriveLanguages');
Route::get('/retriveResults/{id}', 'RetriveController@resultsRetrive')->name('retriveResults');
Route::get('/retriveRoles/{id}', 'RetriveController@rolesRetrive')->name('retriveRoles');
Route::get('/retriveSets/{id}', 'RetriveController@setsRetrive')->name('retriveSets');
Route::get('/retriveUsers/{id}', 'RetriveController@usersRetrive')->name('retriveUsers');

Route::get('/forceDeleteCategories/{id}', 'ForceDeleteController@categoriesForceDelete')->name('forceDeleteCategories');
Route::get('/forceDeleteSubcategories/{id}', 'ForceDeleteController@subcategoriesForceDelete')->name('forceDeleteSubcategories');
Route::get('/forceDeleteEditors/{id}', 'ForceDeleteController@editorsForceDelete')->name('forceDeleteEditors');
Route::get('/forceDeleteLanguages/{id}', 'ForceDeleteController@languagesForceDelete')->name('forceDeleteLanguages');
Route::get('/forceDeleteResults/{id}', 'ForceDeleteController@resultsForceDelete')->name('forceDeleteResults');
Route::get('/forceDeleteRoles/{id}', 'ForceDeleteController@rolesForceDelete')->name('forceDeleteRoles');
Route::get('/forceDeleteSets/{id}', 'ForceDeleteController@setsForceDelete')->name('forceDeleteSets');
Route::get('/forceDeleteUsers/{id}', 'ForceDeleteController@usersForceDelete')->name('forceDeleteUsers');

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

Route::get('/', function () {
    $language = DB::table('languages')->get();
    return view('dashboard', ['language' => $language]);
});

Route::get('lang/{lang}', function($lang) {
  	\Session::put('lang', $lang);
  	return \Redirect::back();
})->middleware('web')->name('change_lang');

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Diagnose
Route::get('/diagnose', 'DiagnosesController@index');
Route::post('/diagnose/process', 'DiagnosesController@process');
Route::get('/diagnose/get_case_base', 'DiagnosesController@get_case_base');
Route::post('/diagnose/result', 'DiagnosesController@result');
Route::get('/diagnose/get_solution_by_disease/{id}', 'DiagnosesController@get_solution_by_disease');

//Disease
Route::get('/disease', 'DiseasesController@index');
Route::post('/disease/show_disease_DT', 'DiseasesController@show_disease_DT');
Route::get('/disease/create', 'DiseasesController@create');
Route::post('/disease/store', 'DiseasesController@store');
Route::get('/disease/edit/{id}', 'DiseasesController@edit');
Route::post('/disease/update/{id}', 'DiseasesController@update');
Route::get('/disease/destroy/{id}', 'DiseasesController@destroy');
Route::get('/disease/unactivate/{id}', 'DiseasesController@unactivate');
Route::get('/disease/activate/{id}', 'DiseasesController@activate');

//Symptom
Route::get('/symptom', 'SymptomsController@index');
Route::post('/symptom/show_symptom_DT', 'SymptomsController@show_symptom_DT');
Route::get('/symptom/create', 'SymptomsController@create');
Route::post('/symptom/store', 'SymptomsController@store');
Route::get('/symptom/edit/{id}', 'SymptomsController@edit');
Route::post('/symptom/update/{id}', 'SymptomsController@update');
Route::get('/symptom/destroy/{id}', 'SymptomsController@destroy');
Route::get('/symptom/unactivate/{id}', 'SymptomsController@unactivate');
Route::get('/symptom/activate/{id}', 'SymptomsController@activate');

//Cases
Route::get('/case', 'CasesController@index');
Route::post('/case/show_case_DT', 'CasesController@show_case_DT');
Route::get('/case/create', 'CasesController@create');
Route::post('/case/store', 'CasesController@store');
Route::get('/case/edit/{id}', 'CasesController@edit');
Route::post('/case/update/{id}', 'CasesController@update');
Route::get('/case/destroy/{id}', 'CasesController@destroy');
Route::get('/case/unactivate/{id}', 'CasesController@unactivate');
Route::get('/case/activate/{id}', 'CasesController@activate');

//Solution
Route::get('/solution', 'SolutionsController@index');
Route::post('/solution/show_solution_DT', 'SolutionsController@show_solution_DT');
Route::get('/solution/create', 'SolutionsController@create');
Route::post('/solution/store', 'SolutionsController@store');
Route::get('/solution/edit/{id}', 'SolutionsController@edit');
Route::post('/solution/update/{id}', 'SolutionsController@update');
Route::get('/solution/destroy/{id}', 'SolutionsController@destroy');
Route::get('/solution/unactivate/{id}', 'SolutionsController@unactivate');
Route::get('/solution/activate/{id}', 'SolutionsController@activate');

//Keyword
Route::get('/keyword', 'KeywordsController@index');
Route::post('/keyword/show_keyword_DT', 'KeywordsController@show_keyword_DT');
Route::get('/keyword/create', 'KeywordsController@create');
Route::post('/keyword/store', 'KeywordsController@store');
Route::get('/keyword/edit/{id}', 'KeywordsController@edit');
Route::post('/keyword/update/{id}', 'KeywordsController@update');
Route::get('/keyword/destroy/{id}', 'KeywordsController@destroy');
Route::get('/keyword/unactivate/{id}', 'KeywordsController@unactivate');
Route::get('/keyword/activate/{id}', 'KeywordsController@activate');

//Language
Route::get('/language', 'LanguagesController@index');
Route::post('/language/show_language_DT', 'LanguagesController@show_language_DT');
Route::get('/language/create', 'LanguagesController@create');
Route::post('/language/store', 'LanguagesController@store');
Route::get('/language/edit/{id}', 'LanguagesController@edit');
Route::post('/language/update/{id}', 'LanguagesController@update');
Route::get('/language/destroy/{id}', 'LanguagesController@destroy');
Route::get('/language/unactivate/{id}', 'LanguagesController@unactivate');
Route::get('/language/activate/{id}', 'LanguagesController@activate');

//Vocabulary
Route::get('/vocabulary', 'VocabulariesController@index');
Route::post('/vocabulary/show_vocabulary_DT', 'VocabulariesController@show_vocabulary_DT');
Route::post('/vocabulary/store', 'VocabulariesController@store');
Route::get('/vocabulary/edit/{id}', 'VocabulariesController@edit');
Route::get('/vocabulary/destroy/{id}', 'VocabulariesController@destroy');
Route::get('/vocabulary/unactivate/{id}', 'VocabulariesController@unactivate');
Route::get('/vocabulary/activate/{id}', 'VocabulariesController@activate');

//User
Route::get('/user', 'UsersController@index');
Route::post('/user/show_user_DT', 'UsersController@show_user_DT');
Route::get('/user/create', 'UsersController@create');
Route::post('/user/store', 'UsersController@store');
Route::get('/user/edit/{id}', 'UsersController@edit');
Route::post('/user/update/{id}', 'UsersController@update');
Route::get('/user/destroy/{id}', 'UsersController@destroy');
Route::get('/user/unactivate/{id}', 'UsersController@unactivate');
Route::get('/user/activate/{id}', 'UsersController@activate');
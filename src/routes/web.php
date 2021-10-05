<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    return redirect('vocabulary/list');
});

Route::prefix('vocabulary')->group(function(){
    Route::get('list','App\Http\Controllers\VocabularyController@getlist');
    Route::get('add','App\Http\Controllers\VocabularyController@getadd');
    Route::post('add','App\Http\Controllers\VocabularyController@postadd');
    Route::get('edit/{id}','App\Http\Controllers\VocabularyController@getedit');
    Route::post('edit/{id}','App\Http\Controllers\VocabularyController@postedit');
    Route::get('delete/{id}','App\Http\Controllers\VocabularyController@getdelete');
});

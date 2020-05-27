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



Route::get('/', 'Site\SiteController@index');
Route::get('home', 'Site\SiteController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){


/****************************************************
 * ROTAS DE CURSOS
 * ************************************************** */

    Route::get('cadastrar-curso', 'Painel\CursoController@create')->name('cadastrar-curso');
    Route::post('store', 'Painel\CursoController@store')->name('store');
    Route::get('exibir-cursos', 'Painel\CursoController@show')->name('exibir-cursos');
    Route::any('search-cursos', 'Painel\CursoController@search')->name('search-cursos');
    //Route::get('show-cursos/{url}', 'Painel\CursoController@cursos')->name('show-cursos');
    Route::get('edit.cursos/{id}', 'Painel\CursoController@editCursos')->name('edit.cursos');
    Route::post('update.cursos/{id}', 'Painel\CursoController@updateCursos')->name('update.cursos');
    

    /**********************************
     * * ROTAS DOS MÓDULOS DOS CURSOS
     **********************************/

     Route::get('modulos.cursos/{id}', 'Painel\ModuloController@index')->name('modulos.cursos');
     Route::resource('modulos', 'Painel\ModuloController', ['except' => 'index']);  


    /**********************************
     * * ROTAS DAS AULAS DOS MÓDULOS
     **********************************/

    Route::get('aulas.modulos/{id}', 'Painel\AulasController@index')->name('aulas.modulos');
    Route::resource('aulas', 'Painel\AulasController', ['except' => 'index']);  
});



/****************************************************
 * ROTAS DE USUÁRIOS
 * ************************************************** */
Route::get('cadastrar', 'Painel\UserController@register');
Route::get('logout', 'Painel\UserController@logout');
Route::post('new-user', 'Painel\UserController@create')->name('new-user');
Route::get('perfil', 'Painel\UserController@profile')->name('perfil');
Route::post('profile-update', 'Painel\UserController@update')->name('profile.update');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


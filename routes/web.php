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

#####################  Store #######################################
Route::post('/api/alunos/store','AlunoController@store');
Route::post('/api/cursos/store','CursoController@store');
Route::post('/api/professores/store','ProfessorController@store');
#####################  Formulários de Cadastro #####################
Route::get('/alunos/cadastrar','AlunoController@create');
Route::get('/cursos/cadastrar','CursoController@create');
Route::get('/professores/cadastrar','ProfessorController@create');
#####################  Resources ##################################
Route::resource('/alunos','AlunoController');
Route::resource('/cursos','CursoController');
Route::resource('/professores','ProfessorController');
Route::resource('/','AlunoController');
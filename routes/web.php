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

#####################  Formulários de Cadastro #####################
Route::get('/cursos/cadastrar','CursoController@create');
Route::get('/professores/cadastrar','ProfessorController@create');
Route::get('/alunos/cadastrar','AlunoController@create');

#####################  Resources #####################
Route::resource('/cursos','CursoController');
Route::resource('/professores','ProfessorController');
Route::resource('/alunos','AlunoController');
Route::resource('/','AlunoController');
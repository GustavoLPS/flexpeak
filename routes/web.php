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
############################# Destroy #######################################
Route::get('/api/alunos/destroy/{id}','AlunoController@destroy');
Route::get('/api/cursos/destroy/{id}','CursoController@destroy');
Route::get('/api/professores/destroy/{id}','ProfessorController@destroy');
############################## Update ######################################
Route::post('/api/alunos/update','AlunoController@update');
Route::post('/api/cursos/update','CursoController@update');
Route::post('/api/professores/update','ProfessorController@update');
#############################  Store #######################################
Route::post('/api/alunos/store','AlunoController@store');
Route::post('/api/cursos/store','CursoController@store');
Route::post('/api/professores/store','ProfessorController@store');
###########################  Relatório #####################################
Route::get('/relatorio','RelatorioController@index');
########################## Detalhe Aluno ###################################
Route::get('/alunos/detalhe/{id}','AlunoController@show');
######################  Formulários de Edição ##############################
Route::get('/alunos/editar/{id}','AlunoController@edit');
Route::get('/cursos/editar/{id}','CursoController@edit');
Route::get('/professores/editar/{id}','ProfessorController@edit');
###################### Formulários de Cadastro #############################
Route::get('/alunos/cadastrar','AlunoController@create');
Route::get('/cursos/cadastrar','CursoController@create');
Route::get('/professores/cadastrar','ProfessorController@create');
########################### Resources ######################################
Route::resource('/alunos','AlunoController');
Route::resource('/cursos','CursoController');
Route::resource('/professores','ProfessorController');
Route::resource('/','AlunoController');
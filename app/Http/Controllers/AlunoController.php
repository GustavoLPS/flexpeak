<?php

namespace App\Http\Controllers;

use App\Services\AlunoService;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;
use Datetime;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $alunos = AlunoService::getAll();
        $cursos = $this->curso->all();
        return view('alunos.index',compact('alunos','cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = $this->curso->all();
        return view('alunos.cadastrar',compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->except('_token');

        $data = Datetime::createFromFormat('d/m/Y',$request->input('nascimento'));

        $inserir = AlunoService::store($request->all());

        $cursos = $this->curso->all();

        if(!$inserir) {
            $return = "error";
            return view('alunos.cadastrar',compact('return','cursos'));
        }
        $return = 'success';
        return view('alunos.cadastrar',compact('return','cursos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = $this->aluno->find($id);
        $data = Datetime::createFromFormat('Y-m-d',$aluno->data_nascimento);
        $dt = new DateTime($aluno->created_at);
        $dataC = $dt->format('d/m/Y');
        $cursos = $this->curso->all();
        return view('alunos.detalhe',compact('aluno','cursos','data','dataC'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = $this->aluno->find($id);
        $data = Datetime::createFromFormat('Y-m-d',$aluno->data_nascimento);
        $cursos = $this->curso->all();
        return view('alunos.editar',compact('aluno','cursos','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->except('_token');

        $aluno = $this->aluno->find($request->id_alunos);
        $data = Datetime::createFromFormat('d/m/Y',$request->nascimento);
        $update = $aluno->update([
            'nome_alunos' => $request->nome,
            'data_nascimento' => $data->format('Y-m-d'),
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'id_cursos' => $request->curso
        ]);

        $cursos = $this->curso->all();

        if($update) {
            $return = 'success';
            $aluno = $this->aluno->find($request->id_alunos);
            $data = Datetime::createFromFormat('Y-m-d',$aluno->data_nascimento);
            return view('alunos.editar',compact('return','aluno','cursos','data'));
        } else {
            $return = 'error';
            $aluno = $this->aluno->find($request->id_alunos);
            $data = Datetime::createFromFormat('Y-m-d',$aluno->data_nascimento);
            return view('alunos.editar',compact('return','aluno','cursos','data'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = $this->aluno->find($id);
        $delete = $aluno->delete();

        $alunos = $this->aluno->all();
        $cursos = $this->curso->all();

        if($delete) {
            return view('alunos.index',compact('alunos','cursos'));
        } else {
            return view('alunos.index',compact('alunos','cursos'));
        }
    }
}

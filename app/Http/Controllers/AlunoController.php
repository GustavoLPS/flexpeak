<?php

namespace App\Http\Controllers;

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

    private $aluno;
    private $curso;

    public function __construct(Aluno $aluno, Curso $curso) {
        $this->aluno = $aluno;
        $this->curso = $curso;
    }

    public function index()
    {
        $alunos = $this->aluno->all();
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

        $inserir = $this->aluno->create([
            'nome_alunos' => $request->input('nome'),
            'data_nascimento' => $data->format('Y-m-d'),
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento'),
            'bairro' => $request->input('bairro'),
            'cidade' => $request->input('cidade'),
            'cidade_1' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'cep' => $request->input('cep'),
            'id_cursos' => $request->input('curso')
        ]);

        $cursos = $this->curso->all();

        if($inserir) {
            $return = 'success';
            return view('alunos.cadastrar',compact('return','cursos'));
        } else {
            $return = "error";
            return view('alunos.cadastrar',compact('return','cursos'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

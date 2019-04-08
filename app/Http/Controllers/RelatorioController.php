<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Professores;

class RelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $aluno;
    private $curso;
    private $professor;

    public function __construct(Aluno $aluno,Curso $curso,Professores $professor) {
        $this->aluno = $aluno;
        $this->curso = $curso;
        $this->professor = $professor;
    }

    public function index()
    {
        $alunos = DB::table('alunos')
                    ->select('alunos.nome_alunos','cursos.nome_cursos','professores.nome_professores')
                    ->join('cursos','alunos.id_cursos','=','cursos.id_cursos')
                    ->join('professores','cursos.id_professores','=','professores.id_professores')
                    ->orderBy('nome_alunos','asc')
                    ->get();

        return \PDF::loadView('relatorio.index',compact('alunos'))->setPaper('a4','landscape')->stream('relatorio.pdf');
        //return view('relatorio.index',compact('alunos','cursos','professores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

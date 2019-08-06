<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Services\AlunoService;
use App\Services\CursoService;
use Illuminate\Http\Request;
use App\Models\Aluno;
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
        $cursos = CursoService::getCursosAll();
        return view('alunos.index', ['alunos' => $alunos, 'cursos' => $cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = CursoService::getCursosAll();
        return view('alunos.cadastrar', ['cursos' => $cursos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inserir = AlunoService::store($request->all());

        if(!$inserir) {
            return redirect()
                ->back()
                ->withErrors(['return' => 'error']);
        }
        return redirect()
            ->route('aluno.edit')
            ->with(['return' => 'success']);
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
        $cursos = CursoService::getCursosAll();
        return view('alunos.detalhe',compact('aluno','cursos','data','dataC'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        $cursos = CursoService::getCursosAll();
        return view('alunos.editar', ['aluno' => $aluno, 'cursos' => $cursos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlunoRequest $request, Aluno $aluno)
    {
        if(!AlunoService::update($request->all(), $aluno)) {
            return redirect()
                ->back()
                ->withErrors(['return' => 'error']);
        }
        return redirect()
            ->back()
            ->with(['return' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        if (!AlunoService::destroy($aluno)) {
            return redirect()->back()->withErrors();
        }
        return redirect()->back();
    }
}

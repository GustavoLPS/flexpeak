<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Professores;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $curso;
    private $professor;

    public function __construct(Curso $curso,Professores $professor) {
        $this->curso = $curso;
        $this->professor = $professor;
    }

    public function index()
    {
        $cursos = $this->curso->all();
        $professores = $this->professor->all(); 
        return view('cursos.index',compact('cursos','professores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professores = $this->professor->all();
        return view('cursos.cadastrar',compact('professores'));
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
        $inserir = $this->curso->create([
            'nome_cursos' => $request->input('nome'),
            'id_professores' => $request->input('professor'),
        ]);

        $professores = $this->professor->all();

        if($inserir) {
            $return = 'success';
            return view('cursos.cadastrar',compact('return','professores'));
        } else {
            $return = 'error';
            return view('cursos.cadastrar',compact('return','professores'));
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

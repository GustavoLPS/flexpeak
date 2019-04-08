<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professores;
use Datetime;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $professor;

    public function __construct(Professores $professor) {
        $this->professor = $professor;
    }

    public function index()
    {
        $professores = $this->professor->all();
        return view('professores.index',compact('professores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professores.cadastrar');
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

        $inserir = $this->professor->create([
            'nome_professores' => $request->input('nome'),
            'data_nascimento_professores' => $data->format('Y-m-d')
        ]);

        if($inserir) {
            $return = 'success';
            return view('professores.cadastrar',compact('return'));
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
        $professor = $this->professor->find($id);
        $data = Datetime::createFromFormat('Y-m-d',$professor->data_nascimento_professores);
        return view('professores.editar',compact('professor','data'));
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

        $professor = $this->professor->find($request->id_professores);
        $data = Datetime::createFromFormat('d/m/Y',$request->nascimento);
        $update = $professor->update([
            'nome_professores' => $request->nome,
            'data_nascimento_professores' => $data->format('Y-m-d')
        ]);

        if($update) {
            $professor = $this->professor->find($request->id_professores);
            $data = Datetime::createFromFormat('Y-m-d',$professor->data_nascimento_professores);
            $return = 'success';
            return view('professores.editar',compact('return','professor','data'));
        } else {
            $return = 'error';
            $data = $request->nascimento;
            return view('professores.editar',compact('return','professor','data'));
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
        $professor = $this->professor->find($id);
        $delete = $professor->delete();

        $professores = $this->professor->all();
        
        if($delete){
            return view('professores.index',compact('professores'));
        } else {
            return view('professores.index',compact('professores'));
        }
    }
}

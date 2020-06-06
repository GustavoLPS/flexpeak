<?php


namespace App\Services;


use App\Models\Aluno;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class AlunoService
{
    /**
     * Função para cadastrar um aluno
     * @param $request
     * @return Aluno
     */
    public static function store($request) :Aluno
    {
        try {
            return Aluno::create($request);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    /**
     * Função para atualizar dados de um aluno
     * @param $request
     * @param Aluno $aluno
     * @return bool
     */
    public static function update($request, Aluno $aluno) :bool
    {
        try {
            return $aluno->update($request);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    /**
     * Função para excluir um aluno
     * @param Aluno $aluno
     * @return bool
     */
    public function destroy(Aluno $aluno) :bool
    {
        try {
            return $aluno->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    /**
     * Função para listar todos os alunos
     * @return Collection
     */
    public static function getAll() :Collection
    {
        return Aluno::all();
    }
}

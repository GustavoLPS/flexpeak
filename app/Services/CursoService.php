<?php


namespace App\Services;


use App\Models\Curso;
use Illuminate\Support\Collection;

class CursoService
{
    public static function store($request) :Curso
    {
        try {
            return Curso::create($request);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public static function update($request, Curso $curso) :bool
    {
        try {
            return $curso->update($request);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public static function destroy(Curso $curso) :bool
    {
        try {
            return $curso->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public static function getCursosAll() :Collection
    {
        return Curso::all();
    }

}

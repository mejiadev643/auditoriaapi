<?php

namespace App\Http\Controllers;

use App\Models\mnt_sistema;
use Illuminate\Http\Request;

class MntSistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sistemas = mnt_sistema::all();
        return response()->json(["sistemas" => $sistemas, "mensaje" => "Exito"], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'activo' => 'required',
            'id_institucion' => 'required',
        ]);
        $sistema = new mnt_sistema();
        $sistema->nombre = $request->nombre;
        $sistema->descripcion = $request->descripcion;
        $sistema->activo = $request->activo;
        $sistema->id_institucion = $request->id_institucion;
        $sistema->save();

        return response()->json(["mensaje" => "Se creo con exito"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(mnt_sistema $mnt_sistema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mnt_sistema $mnt_sistema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       try {
            $this->validate($request, [
                'nombre' => 'required',
                'descripcion' => 'required',
                'activo' => 'required',
                'id_institucion' => 'required',
            ]);

            $sistema = mnt_sistema::find($id);
            $sistema->update($request->all());
            return response()->json(["mensaje" => "Se actualizo con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $sistema = mnt_sistema::find($id);
            $sistema->delete();
            return response()->json(["mensaje" => "Se elimino con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error en la eliminacion ", $th->getMessage()], 500);
        }
    }
}

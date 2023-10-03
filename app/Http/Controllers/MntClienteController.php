<?php

namespace App\Http\Controllers;

use App\Models\mnt_cliente;
use Illuminate\Http\Request;

class MntClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = mnt_cliente::all();
        return response()->json(["clientes" => $clientes, "mensaje" => "Exito"], 200);
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
        try {
            $this->validate($request, [
                'nombre' => 'required',
                'descripcion' => 'required',
                'activo' => 'required',
                'id_institucion' => 'required',
            ]);
            $cliente = new mnt_cliente();
            $cliente->nombre = $request->nombre;
            $cliente->descripcion = $request->descripcion;
            $cliente->activo = $request->activo;
            $cliente->id_institucion = $request->id_institucion;
            $cliente->save();

            return response()->json(["mensaje" => "Se creo con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error al crear", $th->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(mnt_cliente $mnt_cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mnt_cliente $mnt_cliente)
    {
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
            $cliente = mnt_cliente::find($id);
            $cliente->nombre = $request->nombre;
            $cliente->descripcion = $request->descripcion;
            $cliente->activo = $request->activo;
            $cliente->id_institucion = $request->id_institucion;
            $cliente->save();

            return response()->json(["mensaje" => "Se actualizo con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error al actualizar", $th->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $cliente = mnt_cliente::find($id);
            $cliente->delete();
            return response()->json(["mensaje" => "Se elimino con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error al eliminar", $th->getMessage()], 400);
        }
    }
}

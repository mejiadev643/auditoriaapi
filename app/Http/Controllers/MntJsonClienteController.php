<?php

namespace App\Http\Controllers;

use App\Models\mnt_json_cliente;
use Illuminate\Http\Request;

class MntJsonClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $json_clientes = mnt_json_cliente::all();
        return response()->json(["json_clientes" => $json_clientes, "mensaje" => "Exito"], 200);
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
                'json' => 'required',
                'id_cliente' => 'required',
            ]);
            $json_cliente = new mnt_json_cliente();
            $json_cliente->json = $request->json;
            $json_cliente->id_cliente = $request->id_cliente;
            $json_cliente->save();

            return response()->json(["mensaje" => "Se creo con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error al crear", $th->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(mnt_json_cliente $mnt_json_cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mnt_json_cliente $mnt_json_cliente)
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
                'json' => 'required',
                'id_cliente' => 'required',
            ]);
            $json_cliente = mnt_json_cliente::find($id);
            $json_cliente->json = $request->json;
            $json_cliente->id_cliente = $request->id_cliente;
            $json_cliente->update($request->all());
            return response()->json(["mensaje" => "Se actualizo con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error en la actualizacion", $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $json_cliente = mnt_json_cliente::find($id);
            $json_cliente->delete();
            return response()->json(["mensaje" => "Se elimino con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error en la eliminacion", $th->getMessage()], 500);
        }
    }
}

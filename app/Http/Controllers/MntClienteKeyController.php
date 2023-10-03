<?php

namespace App\Http\Controllers;

use App\Models\mnt_cliente_key;
use Illuminate\Http\Request;

class MntClienteKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente_keys = mnt_cliente_key::all();
        return response()->json(["cliente_keys" => $cliente_keys, "mensaje" => "Exito"], 200);
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
                    'id_key' => 'required',
                    'secret_key' => 'required',
                    'activo' => 'required',
                    'id_permiso' => 'required',
                    'id_sistema' => 'required',
                    'id_cliente' => 'required',
                ]);
                $cliente_key = new mnt_cliente_key();
                $cliente_key->id_key = $request->id_key;
                $cliente_key->secret_key = $request->secret_key;
                $cliente_key->activo = $request->activo;
                $cliente_key->id_permiso = $request->id_permiso;
                $cliente_key->id_sistema = $request->id_sistema;
                $cliente_key->id_cliente = $request->id_cliente;
                $cliente_key->save();

                return response()->json(["mensaje" => "Se creo con exito"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(mnt_cliente_key $mnt_cliente_key)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mnt_cliente_key $mnt_cliente_key)
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
                        'id_key' => 'required',
                        'secret_key' => 'required',
                        'activo' => 'required',
                        'id_permiso' => 'required',
                        'id_sistema' => 'required',
                        'id_cliente' => 'required',
                    ]);
                    $cliente_key = mnt_cliente_key::find($id);
                    $cliente_key->id_key = $request->id_key;
                    $cliente_key->secret_key = $request->secret_key;
                    $cliente_key->activo = $request->activo;
                    $cliente_key->id_permiso = $request->id_permiso;
                    $cliente_key->id_sistema = $request->id_sistema;
                    $cliente_key->id_cliente = $request->id_cliente;
                    $cliente_key->save();

                    return response()->json(["mensaje" => "Se actualizo con exito"], 200);
            } catch (\Exception $e) {
                    return response()->json(["mensaje" => "Error al actualizar",$e->getMessage()], 500);
            }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
                $cliente_key = mnt_cliente_key::find($id);
                $cliente_key->delete();
                return response()->json(["mensaje" => "Se elimino con exito"], 200);
        } catch (\Exception $e) {
                return response()->json(["mensaje" => "Error al eliminar",$e->getMessage()], 500);
        }
    }
}

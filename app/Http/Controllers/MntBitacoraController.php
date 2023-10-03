<?php

namespace App\Http\Controllers;

use App\Models\mnt_bitacora;
use Illuminate\Http\Request;

class MntBitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bitacoras = mnt_bitacora::all();
        return response()->json(["bitacoras" => $bitacoras, "mensaje" => "Exito"], 200);
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
                'id_cliente_key' => 'required',
                'ip_sistema' => 'required',
                'numero_documento_usuario' => 'required',
                'respuesta' => 'required',
                'id_tipo_bitacora' => 'required',
                'fecha'=> 'required',
            ]);
            $bitacora = new mnt_bitacora();
            $bitacora->id_cliente_key = $request->id_cliente_key;
            $bitacora->ip_sistema = $request->ip_sistema;
            $bitacora->numero_documento_usuario = $request->numero_documento_usuario;
            $bitacora->respuesta = $request->respuesta;
            $bitacora->id_tipo_bitacora = $request->id_tipo_bitacora;
            $bitacora->fecha = $request->fecha;
            $bitacora->save();

            return response()->json(["mensaje" => "Se creo con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error al crear", $th->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(mnt_bitacora $mnt_bitacora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mnt_bitacora $mnt_bitacora)
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
                'id_cliente_key' => 'required',
                'ip_sistema' => 'required',
                'numero_documento_usuario' => 'required',
                'respuesta' => 'required',
                'id_tipo_bitacora' => 'required',
                'fecha'=> 'required',
            ]);
            $bitacora = mnt_bitacora::find($id);
            $bitacora->id_cliente_key = $request->id_cliente_key;
            $bitacora->ip_sistema = $request->ip_sistema;
            $bitacora->numero_documento_usuario = $request->numero_documento_usuario;
            $bitacora->respuesta = $request->respuesta;
            $bitacora->id_tipo_bitacora = $request->id_tipo_bitacora;
            $bitacora->fecha = $request->fecha;
            $bitacora->save();

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
            $bitacora = mnt_bitacora::find($id);
            $bitacora->delete();
            return response()->json(["mensaje" => "Se elimino con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error al eliminar", $th->getMessage()], 400);
        }
    }
}

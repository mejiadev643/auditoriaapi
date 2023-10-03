<?php

namespace App\Http\Controllers;

use App\Models\mnt_json_cliente_permiso;
use Illuminate\Http\Request;

class MntJsonClientePermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $json_cliente_permisos = mnt_json_cliente_permiso::all();
        return response()->json(["json_cliente_permisos" => $json_cliente_permisos, "mensaje" => "Exito"], 200);
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
                'id_json' => 'required',
                'cantidad_peticiones' => 'required',
                'json_campos_permitidos' => 'required',
            ]);
            $json_cliente_permiso = new mnt_json_cliente_permiso();
            $json_cliente_permiso->id_json = $request->id_json;
            $json_cliente_permiso->cantidad_peticiones = $request->cantidad_peticiones;
            $json_cliente_permiso->json_campos_permitidos = $request->json_campos_permitidos;
            $json_cliente_permiso->save();

            return response()->json(["mensaje" => "Se creo con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error al crear", $th->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(mnt_json_cliente_permiso $mnt_json_cliente_permiso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mnt_json_cliente_permiso $mnt_json_cliente_permiso)
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
                'id_json' => 'required',
                'cantidad_peticiones' => 'required',
                'json_campos_permitidos' => 'required',
            ]);
            $json_cliente_permiso = mnt_json_cliente_permiso::find($id);
            $json_cliente_permiso->id_json = $request->id_json;
            $json_cliente_permiso->cantidad_peticiones = $request->cantidad_peticiones;
            $json_cliente_permiso->json_campos_permitidos = $request->json_campos_permitidos;
            $json_cliente_permiso->save();

            return response()->json(["mensaje" => "Se actualizo con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error en la actualizacion",$th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         try {
                $json_cliente_permiso = mnt_json_cliente_permiso::find($id);
                $json_cliente_permiso->delete();
                return response()->json(["mensaje" => "Se elimino con exito"], 200);
          } catch (\Throwable $th) {
                return response()->json(["mensaje" => "Error en la eliminacion ",$th->getMessage()], 500);
          }
    }
}

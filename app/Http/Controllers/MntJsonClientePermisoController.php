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
        //
        $json_cliente = mnt_json_cliente_permiso::with('mnt_json_cliente')->get();

        return response()->json(["status"=>"ok","data"=>$json_cliente],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return $request->json;
        $validate = $request->validate([
            'id_json' => 'required',
            'cantidad_peticiones' => 'required',
            'json_campos_permitidos' => 'required'
        ]);
        //return $validate;


        $jsonCliente = new mnt_json_cliente_permiso();
        //$jsonCliente->json = json_encode($validate['json']);
        $jsonCliente->json_campos_permitidos = json_decode($request->json_campos_permitidos);
        $jsonCliente->id_json = $validate['id_json'];
        $jsonCliente->cantidad_peticiones = $validate['cantidad_peticiones'];
        //return json_decode($request->json);

        try {
            $jsonCliente->save();
        } catch (\Throwable $th) {
            return response()->json(["status"=>"error","data"=>$th],419);

        }

    // Devuelve una respuesta JSON con el modelo almacenado
        return response()->json(["status"=>"ok","data"=>$jsonCliente],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
        $mnt_json_cliente_permiso = mnt_json_cliente_permiso::findorfail($id);

        } catch (\Throwable $th) {
            return response()->json(["status"=>"error","data"=>$th],419);
        }

        return response()->json(["status"=>"ok","data"=>$mnt_json_cliente_permiso],200);
    }


    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, $id_mnt_json_cliente_permiso)
    public function update(Request $request, $id_mnt_json_cliente_permiso)
    {
        $validate = $request->validate([
            'id_json' => 'required',
            'cantidad_peticiones' => 'required',
            'json_campos_permitidos' => 'required'
        ]);
        //return $request->json_campos_permitidos;

        $mnt_json_cliente_permiso= mnt_json_cliente_permiso::find($id_mnt_json_cliente_permiso);

        try{
            $mnt_json_cliente_permiso->update([
                'id_json' => $validate['id_json'],
                'cantidad_peticiones' => $validate['cantidad_peticiones'],
                'json_campos_permitidos' => json_decode($request->json_campos_permitidos),
            ]);
        }catch(\Throwable $th){
            //return response()->json("Error No se pudo ejecutar la operación en la base de datos",200);
            return response()->json(["status"=>"error","data"=>$th],419);
        }
        return response()->json(["status"=>"ok","data"=>$mnt_json_cliente_permiso],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id_mnt_json_cliente_permiso)
    {
        $mnt_json_cliente_permiso= mnt_json_cliente_permiso::find($id_mnt_json_cliente_permiso);
        try {
            $mnt_json_cliente_permiso->delete();
        } catch (\Throwable $th) {
            return response()->json(["status"=>"error","data"=>$th],419);
        }

        return response()->json(["status"=>"ok","data"=>$mnt_json_cliente_permiso],200);
    }
}

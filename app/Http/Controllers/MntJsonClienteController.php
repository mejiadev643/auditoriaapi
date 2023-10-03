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
        //
        $json_cliente = mnt_json_cliente::all();
        
        return response()->json($json_cliente);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'json' => 'required|json',
            'id_cliente' => 'required'
        ]);
        $jsonCliente = new mnt_json_cliente();
        //$jsonCliente->json = json_encode($validate['json']);
        $jsonCliente->json =$validate['json'];
        $jsonCliente->id_cliente = $validate['id_cliente'];
        //dd($jsonCliente);

        $jsonCliente->save();

    // Devuelve una respuesta JSON con el modelo almacenado
        return response()->json($jsonCliente, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
        $mnt_json_cliente = mnt_json_cliente::with('ctl_institucion')->findorfail($id);

        } catch (\Throwable $th) {
            return response()->json("Error, no se ha podido encontrar el dato solicitado",200);
        }

        return response()->json($mnt_json_cliente,200);
    }


    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, $id_mnt_json_cliente)
    public function update(Request $request, $id_mnt_json_cliente)
    {
        $validate= $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
            'id_institucion'=>'required'
        ]);
        //['nombre',=>"pepe",'desccripcion",=>'descripcion']

        $mnt_json_cliente= mnt_json_cliente::find($id_mnt_json_cliente);

        try{
            $mnt_json_cliente->update([
                'nombre' => $validate['nombre'],
                'descripcion' => $validate['descripcion'],
                'id_institucion' => $validate['id_institucion']
            ]);
        }catch(\Throwable $th){
            return response()->json("Error No se pudo ejecutar la operación en la base de datos",200);
        }
        return response()->json($mnt_json_cliente,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id_mnt_json_cliente)
    {
        $mnt_json_cliente= mnt_json_cliente::find($id_mnt_json_cliente);
        try {
            $mnt_json_cliente->delete();
        } catch (\Throwable $th) {
            return response()->json("Error, no se ha podido eliminar el dato",200);
        }

            return response()->json($mnt_json_cliente,200);
    }
}

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
        //
        $cliente = mnt_sistema::with('ctl_institucion')->get();
        return response()->json($cliente);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate= $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
            'id_institucion'=>'required'
        ]);

        $store= mnt_sistema::create($validate);
        return response()->json($store,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
        $mnt_sistema = mnt_sistema::with('ctl_institucion')->findorfail($id);

        } catch (\Throwable $th) {
            return response()->json("Error, no se ha podido encontrar el dato solicitado",200);
        }

        return response()->json($mnt_sistema,200);
    }


    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, $id_mnt_sistema)
    public function update(Request $request, $id_mnt_sistema)
    {
        $validate= $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
            'id_institucion'=>'required'
        ]);
        //['nombre',=>"pepe",'desccripcion",=>'descripcion']

        $mnt_sistema= mnt_sistema::find($id_mnt_sistema);

        try{
            $mnt_sistema->update([
                'nombre' => $validate['nombre'],
                'descripcion' => $validate['descripcion'],
                'id_institucion' => $validate['id_institucion']
            ]);
        }catch(\Throwable $th){
            return response()->json("Error No se pudo ejecutar la operación en la base de datos",200);
        }
        return response()->json($mnt_sistema,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id_mnt_sistema)
    {
        $mnt_sistema= mnt_sistema::find($id_mnt_sistema);
        try {
            $mnt_sistema->delete();
        } catch (\Throwable $th) {
            return response()->json("Error, no se ha podido eliminar el dato",200);
        }

            return response()->json($mnt_sistema,200);
    }
}

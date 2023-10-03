<?php

namespace App\Http\Controllers;

use App\Models\ctl_tipo_bitacora;
use Illuminate\Http\Request;

class CtlTipoBitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cliente = ctl_tipo_bitacora::all();
        return response()->json($cliente);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate= $request->validate([
            'nombre'=>'required'
        ]);

        $store= ctl_tipo_bitacora::create($validate);
        return response()->json($store,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
        $ctl_tipo_bitacora = ctl_tipo_bitacora::findorfail($id);

        } catch (\Throwable $th) {
            return response()->json("Error, no se ha podido encontrar el dato solicitado",200);
        }

        return response()->json($ctl_tipo_bitacora,200);
    }


    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, $id_ctl_tipo_bitacora)
    public function update(Request $request, $id_ctl_tipo_bitacora)
    {
        $validate= $request->validate([
            'nombre'=>'required'
        ]);
        //['nombre',=>"pepe",'desccripcion",=>'descripcion']

        $ctl_tipo_bitacora= ctl_tipo_bitacora::find($id_ctl_tipo_bitacora);

        try{
            $ctl_tipo_bitacora->update([
                'nombre' => $validate['nombre']
            ]);
        }catch(\Throwable $th){
            return response()->json("Error No se pudo ejecutar la operación en la base de datos",200);
        }
        return response()->json($ctl_tipo_bitacora,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id_ctl_tipo_bitacora)
    {
        $ctl_tipo_bitacora= ctl_tipo_bitacora::find($id_ctl_tipo_bitacora);
        try {
            $ctl_tipo_bitacora->delete();
        } catch (\Throwable $th) {
            return response()->json("Error, no se ha podido eliminar el dato",200);
        }

            return response()->json($ctl_tipo_bitacora,200);
    }
}


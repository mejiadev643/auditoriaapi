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
            return response()->json(["status"=>"ok","data"=>$cliente],200);
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

        try {
            $store= ctl_tipo_bitacora::create($validate);
        } catch (\Throwable $th) {
            return response()->json(["status"=>"error","data"=>$th],419);

        }
            return response()->json(["status"=>"ok","data"=>$store],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
        $ctl_tipo_bitacora = ctl_tipo_bitacora::findorfail($id);

        } catch (\Throwable $th) {
            return response()->json(["status"=>"error","data"=>$th],419);
        }

            return response()->json(["status"=>"ok","data"=>$ctl_tipo_bitacora],200);
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

        $ctl_tipo_bitacora= ctl_tipo_bitacora::find($id_ctl_tipo_bitacora);

        try{
            $ctl_tipo_bitacora->update([
                'nombre' => $validate['nombre']
            ]);
        }catch(\Throwable $th){
            return response()->json(["status"=>"error","data"=>$th],419);
        }
            return response()->json(["status"=>"ok","data"=>$ctl_tipo_bitacora],200);

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
            return response()->json(["status"=>"error","data"=>$th],419);
        }

            return response()->json(["status"=>"ok","data"=>$ctl_tipo_bitacora],200);
    }
}


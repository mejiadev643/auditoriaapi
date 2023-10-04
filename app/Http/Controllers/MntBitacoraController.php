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
        //
        $json_cliente = mnt_bitacora::with('mnt_cliente_key','ctl_tipo_bitacora')->get();

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
            'id_cliente_key' => 'required',
            'ip_sistema' => 'required',
            'numero_documento_usuario'=>'required',
            'respuesta'=>'required',
            'id_tipo_bitacora'=>'required',

        ]);
        $validate['fecha']= date('y-m-d');
        //return $validate;


        try {
            $mnt_cliente= mnt_bitacora::create($validate);
        } catch (\Throwable $th) {
            return response()->json(["status"=>"error","data"=>$th],419);
        }
        return response()->json(["status"=>"ok","data"=>$mnt_cliente],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $json_bitacora = mnt_bitacora::with('mnt_cliente_key','ctl_tipo_bitacora')->findOrFail($id);

        } catch (\Throwable $th) {
            return response()->json(["status"=>"error","data"=>$th],419);

        }

        return response()->json(["status"=>"ok","data"=>$json_bitacora],200);

    }


    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, $id_mnt_bitacora)
    public function update(Request $request, $id_mnt_bitacora)
    {
        $validate = $request->validate([
            'id_cliente_key' => 'required',
            'ip_sistema' => 'required',
            'numero_documento_usuario'=>'required',
            'respuesta'=>'required',
            'id_tipo_bitacora'=>'required'

        ]);

        $mnt_bitacora= mnt_bitacora::find($id_mnt_bitacora);

        try{
            $mnt_bitacora->update([

                'id_cliente_key' => $validate['id_cliente_key'],
                'ip_sistema' => $validate['ip_sistema'],
                'numero_documento_usuario'=>$validate['numero_documento_usuario'],
                'respuesta'=>$validate['respuesta'],
                'id_tipo_bitacora'=>$validate['id_tipo_bitacora']

            ]);
        }catch(\Throwable $th){
            return response()->json(["status"=>"error","data"=>$th],419);
        }
            return response()->json(["status"=>"ok","data"=>$mnt_bitacora],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id_mnt_bitacora)
    {
        $mnt_bitacora= mnt_bitacora::find($id_mnt_bitacora);
        try {
            $mnt_bitacora->delete();
        } catch (\Throwable $th) {
            return response()->json(["status"=>"error","data"=>$th],419);
        }

            return response()->json(["status"=>"ok","data"=>$mnt_bitacora],200);
    }
}

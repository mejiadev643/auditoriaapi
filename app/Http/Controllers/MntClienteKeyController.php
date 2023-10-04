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
        //
        $json_cliente = mnt_cliente_key::with('mnt_sistema','mnt_cliente','mnt_json_cliente_permisos')->get();

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
            'id_key' => 'required',
            'secret_key' => 'required',
            'id_permiso'=>'required|int',
            'id_sistema'=>'required|int',
            'id_cliente'=>'required|int',
        ]);
        //return $validate;


        try {
            $mnt_cliente= mnt_cliente_key::create($validate);
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
        $mnt_cliente_key = mnt_cliente_key::with('mnt_sistema','mnt_cliente','mnt_json_cliente_permisos')->findorfail($id);

        } catch (\Throwable $th) {
            //return response()->json("Error, no se ha podido encontrar el dato solicitado",200);
            return response()->json(["status"=>"error","data"=>$th],419);
        }

        return response()->json(["status"=>"ok","data"=>$mnt_cliente_key],200);
    }


    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, $id_mnt_cliente_key)
    public function update(Request $request, $id_mnt_cliente_key)
    {
        $validate = $request->validate([
            'id_key' => 'required',
            'secret_key' => 'required',
            'id_permiso'=>'required|int',
            'id_sistema'=>'required|int',
            'id_cliente'=>'required|int',
        ]);
        //['nombre',=>"pepe",'desccripcion",=>'descripcion']

        $mnt_cliente_key= mnt_cliente_key::find($id_mnt_cliente_key);

        try{
            $mnt_cliente_key->update([

                'id_key' => $validate['id_key'],
                'secret_key' => $validate['secret_key'],
                'id_permiso'=>$validate['id_permiso'],
                'id_sistema'=>$validate['id_sistema'],
                'id_cliente'=>$validate['id_cliente']

            ]);
        }catch(\Throwable $th){
            return response()->json(["status"=>"error","data"=>$th],419);
        }
        return response()->json(["status"=>"ok","data"=>$mnt_cliente_key],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id_mnt_cliente_key)
    {
        $mnt_cliente_key= mnt_cliente_key::find($id_mnt_cliente_key);
        try {
            $mnt_cliente_key->delete();
        } catch (\Throwable $th) {
            return response()->json(["status"=>"error","data"=>$th],419);
        }

        return response()->json(["status"=>"ok","data"=>$mnt_cliente_key],200);
    }
}

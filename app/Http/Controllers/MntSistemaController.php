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
        return response()->json(["status"=>"ok","data"=>$cliente],200);
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

        try {
            $store= mnt_sistema::create($validate);
        } catch (\Throwable $th) {
            return response()->json(["status"=>"ok","data"=>$th],419);
        }
        return response()->json(["status"=>"ok","data"=>$store],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
        $mnt_sistema = mnt_sistema::with('ctl_institucion')->findorfail($id);

        } catch (\Throwable $th) {
            return response()->json(["status"=>"ok","data"=>$th],419);
        }

        return response()->json(["status"=>"ok","data"=>$mnt_sistema],200);
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

        $mnt_sistema= mnt_sistema::find($id_mnt_sistema);

        try{
            $mnt_sistema->update([
                'nombre' => $validate['nombre'],
                'descripcion' => $validate['descripcion'],
                'id_institucion' => $validate['id_institucion']
            ]);
        }catch(\Throwable $th){
            return response()->json(["status"=>"ok","data"=>$th],419);
        }
        return response()->json(["status"=>"ok","data"=>$mnt_sistema],200);

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
            return response()->json(["status"=>"ok","data"=>$th],419);
        }

        return response()->json(["status"=>"ok","data"=>$mnt_sistema],200);
    }
}

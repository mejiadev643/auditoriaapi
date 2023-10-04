<?php

namespace App\Http\Controllers;

use App\Models\ctl_institucion;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class CtlInstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $institucion= ctl_institucion::all();
        return response()->json(["status"=>"ok","data"=>$institucion],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate= $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);
        try {
            $store= ctl_institucion::create($validate);
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
        $ctl_institucion= ctl_institucion::findorfail($id);

        } catch (\Throwable $th) {
            return response()->json(["status"=>"error","data"=>$th],419);
        }

        return response()->json(["status"=>"ok","data"=>$ctl_institucion],200);
    }


    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, $id_ctl_institucion)
    public function update(Request $request, $id_ctl_institucion)
    {
        $validate= $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);
        $ctl_institucion= ctl_institucion::find($id_ctl_institucion);

        try{
            $ctl_institucion->update([
                'nombre' => $validate['nombre'],
                'descripcion' => $validate['descripcion']
            ]);
        }catch(\Throwable $th){
        return response()->json(["status"=>"error","data"=>$th],419);
        }
        return response()->json(["status"=>"ok","data"=>$ctl_institucion],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id_ctl_institucion)
    {
        $ctl_institucion= ctl_institucion::find($id_ctl_institucion);
        try {
            $ctl_institucion->delete();
        } catch (\Throwable $th) {
            return response()->json(["status"=>"error","data"=>$th],419);

        }

        return response()->json(["status"=>"ok","data"=>$ctl_institucion],200);
    }
}

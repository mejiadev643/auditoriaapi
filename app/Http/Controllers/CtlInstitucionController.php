<?php

namespace App\Http\Controllers;

use App\Models\ctl_institucion;
use Illuminate\Http\Request;

class CtlInstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instituciones = ctl_institucion::all();
        return response()->json(["instituciones" => $instituciones, "mensaje" => "Exito"], 200);
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
                'nombre' => 'required',
                'descripcion' => 'required',
            ]);
            $institucion = new ctl_institucion();
            $institucion->nombre = $request->nombre;
            $institucion->descripcion = $request->descripcion;
            $institucion->save();
            return response()->json(["mensaje" => "Se guardo con exito ",$institucion], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error en la creacion"], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ctl_institucion $ctl_institucion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ctl_institucion $ctl_institucion)
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
                'nombre' => 'required',
                'descripcion' => 'required',
            ]);
            $institucion = ctl_institucion::find($id);
            $institucion->nombre = $request->nombre;
            $institucion->descripcion = $request->descripcion;
            $institucion->update($request->all());
            return response()->json(["mensaje" => "Se actualizo con exito ",$institucion], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error"], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $institucion = ctl_institucion::find($id);
            $institucion->delete();
            return response()->json(["mensaje" => "Se elimino con exito "], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error",$th->getMessage()], 500);
        }
    }
}

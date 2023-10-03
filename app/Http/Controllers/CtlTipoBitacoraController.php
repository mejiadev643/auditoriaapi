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
        $tipo_bitacoras = ctl_tipo_bitacora::all();
        return response()->json(["tipo_bitacoras" => $tipo_bitacoras, "mensaje" => "Exito"], 200);
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

            $this->validate($request, [
                'nombre' => 'required',
            ]);
            $tipo_bitacora = new ctl_tipo_bitacora();
            $tipo_bitacora->nombre = $request->nombre;
            $tipo_bitacora->save();

            return response()->json(["mensaje" => "Se creo con exito"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(ctl_tipo_bitacora $ctl_tipo_bitacora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ctl_tipo_bitacora $ctl_tipo_bitacora)
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
            ]);
            $tipo_bitacora = ctl_tipo_bitacora::find($id);
            $tipo_bitacora->nombre = $request->nombre;
            $tipo_bitacora->save();
            return response()->json(["mensaje" => "Se actualizo con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error en la actualizacion ", $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       try {
            $tipo_bitacora = ctl_tipo_bitacora::find($id);
            $tipo_bitacora->delete();
            return response()->json(["mensaje" => "Se elimino con exito"], 200);
        } catch (\Throwable $th) {
            return response()->json(["mensaje" => "Error en la eliminacion ", $th->getMessage()], 500);
        }
    }
}

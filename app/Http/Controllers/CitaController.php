<?php

namespace App\Http\Controllers;

use App\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cita = Cita::all();
        return response()->json([
            'success' => "Citas Listadas",
            'content' => $cita
        ],200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'id_disponibilidad'=>'required|integer|exists:disponibilidades,id',
           'id_institucion'=>'nullable|integer|exists:institucion,id',
           'id_natural'=>'nullable|integer|exists:natural,id',
           'estado'=>'required|string',
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear cita",
                    'datos' => $validator
                ],500);
        }
        $cita = cita::create([
            'id_disponibilidad' => $request->input('id_disponibilidad' ),
            'id_institucion' => $request->input('id_institucion' ),
            'id_natural' => $request->input('id_natural' ),
            'estado' => $request->input('estado' ),
        ]);

          return response()->json($cita);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        //
         $cita = Cita::findOrFail($cita);
         return response()->json($cita);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        //
         $validator = Validator::make($request->all(), [
            'id_disponibilidad'=>'required|integer|exists:disponibilidades,id',
           'id_institucion'=>'nullable|integer|exists:institucion,id',
           'id_natural'=>'nullable|integer|exists:natural,id',
           'estado'=>'required|string',
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear cita",
                    'datos' => $validator
                ],500);
        }
        
        $cita = Cita::findOrFail($cita);
        $cita->id_disponibilidad= $request->input('id_disponibilidad' );
        $cita->id_institucion= $request->input('id_institucion' );
        $cita->id_natural= $request->input('id_natural' );
        $cita->estado= $request->input('estado' );
        $cita->save();
        return response()->json($cita);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        //
        $cita->delete();
        $cita = Cita::all();
        return response()->json($cita);
    }
}

<?php

namespace App\Http\Controllers;

use App\Disponibilidad;
use Illuminate\Http\Request;

class DisponibilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $disponibilidad = Disponibilidad::all();
        return response()->json([
            'success' => "Disponibilidades Listadas",
            'content' => $disponibilidad
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
            'fecha'=>'required',
           'horainicio'=>'required',
           'horafin'=>'required',
           
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Disponibilidad",
                    'datos' => $validator
                ],500);
        }
        $disponibilidad = Disponibilidad::create([
            'fecha' => $request->input('fecha' ),
            'horainicio' => $request->input('horainicio' ),
            'horafin' => $request->input('horafin' ),
            
        ]);

          return response()->json($disponibilidad);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disponibilidad  $disponibilidad
     * @return \Illuminate\Http\Response
     */
    public function show(Disponibilidad $disponibilidad)
    {
        //
         $disponibilidad = Disponibilidad::findOrFail($disponibilidad);
         return response()->json($disponibilidad);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disponibilidad  $disponibilidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disponibilidad $disponibilidad)
    {
        //
        $validator = Validator::make($request->all(), [
            'fecha'=>'required',
           'horainicio'=>'required',
           'horafin'=>'required',
           
        ]);
        $disponibilidad = Disponibilidad::findOrFail($disponibilidad);
        $disponibilidad->fecha= $request->input('fecha' );
        $disponibilidad->horainicio= $request->input('horainicio' );
        $disponibilidad->horafin= $request->input('horafin' );
        $disponibilidad->save();
        return response()->json($disponibilidad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disponibilidad  $disponibilidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disponibilidad $disponibilidad)
    {
        //
        $disponibilidad->delete();
        $disponibilidad = Disponibilidad::all();
        return response()->json($disponibilidad);
    }
}

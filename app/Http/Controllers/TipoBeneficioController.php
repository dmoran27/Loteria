<?php

namespace App\Http\Controllers;

use App\TipoBeneficio;
use Illuminate\Http\Request;

class TipoBeneficioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipoBeneficio = TipoBeneficio::all();
        return response()->json([
            'success' => "TipoBeneficios Listadas",
            'content' => $tipoBeneficio
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
            'nombre'=>'required|integer',
           'descripcion'=>'nullable|integer',
           'requisitos'=>'nullable|integer',

        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear TipoBeneficio",
                    'datos' => $validator
                ],500);
        }
        $tipoBeneficio = TipoBeneficio::create([
            'nombre' => $request->input('nombre' ),
            'descripcion' => $request->input('descripcion' ),
            'requisitos' => $request->input('requisitos' ),

        ]);

          return response()->json($tipoBeneficio);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoBeneficio  $tipoBeneficio
     * @return \Illuminate\Http\Response
     */
    public function show(TipoBeneficio $tipoBeneficio)
    {
        //
         $tipoBeneficio = TipoBeneficio::findOrFail($tipoBeneficio);
         return response()->json($tipoBeneficio);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoBeneficio  $tipoBeneficio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoBeneficio $tipoBeneficio)
    {
        //
        $tipoBeneficio = TipoBeneficio::findOrFail($tipoBeneficio);
        $tipoBeneficio->nombre= $request->input('nombre' );
        $tipoBeneficio->descripcion= $request->input('descripcion' );
        $tipoBeneficio->requisitos= $request->input('requisitos' );
        $tipoBeneficio->save();
        return response()->json($tipoBeneficio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoBeneficio  $tipoBeneficio
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoBeneficio $tipoBeneficio)
    {
        //
        $tipoBeneficio->delete();
        $tipoBeneficio = TipoBeneficio::all();
        return response()->json($tipoBeneficio);
    }
}

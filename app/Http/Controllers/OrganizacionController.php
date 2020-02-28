<?php

namespace App\Http\Controllers;

use App\Institucion;
use Illuminate\Http\Request;

class OrganizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $institucion = Institucion::all();
        return response()->json([
            'success' => "Entidades Institucionales Listadas",
            'content' => $institucion
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
            'razonsocial'=>'required|integer',
           'tipodedocumento'=>'required|integer',
           'nrodeidentificacion'=>'required|integer|unique:instituciones,cedula,'   ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Institucion",
                    'datos' => $validator
                ],500);
        }
        $institucion = Institucion::create([
            'razonsocial' => $request->input('razonsocial' ),
            'tipodedocumento' => $request->input('tipodedocumento' ),
            'nrodeidentificacion' => $request->input('nrodeidentificacion' ),
            'id_user' =>  auth()->user()->id,
        ]);

          return response()->json($institucion);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show(Institucion $institucion)
    {
        //
         $institucion = Institucion::findOrFail($institucion);
         return response()->json($institucion);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institucion $institucion)
    {
        //
         $validator = Validator::make($request->all(), [
            'razonsocial'=>'required|integer',
           'tipodedocumento'=>'required|integer',
           'nrodeidentificacion'=>'required|integer|unique:instituciones,'.$institucion->id,  
            ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Institucion",
                    'datos' => $validator
                ],500);
        }
        $institucion = Institucion::findOrFail($institucion);
        $institucion->razonsocial= $request->input('razonsocial' );
        $institucion->tipodedocumento= $request->input('tipodedocumento' );
        $institucion->nrodeidentificacion= $request->input('nrodeidentificacion' );
        $institucion->save();
        return response()->json($institucion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institucion $institucion)
    {
        //
        $institucion->delete();
        $institucion = Institucion::all();
        return response()->json($institucion);
    }
}

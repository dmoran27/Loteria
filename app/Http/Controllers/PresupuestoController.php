<?php

namespace App\Http\Controllers;

use App\Presupuesto;
use Illuminate\Http\Request;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $presupuesto = Presupuesto::all();
        return response()->json([
            'success' => "Personas Presupuestoes Listadas",
            'content' => $presupuesto
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
           
           'tipodedocumento'=>'required|srting',
           'nroidentificacion'=>'required|string',
           'razonsocial'=>'required|string',
           'telefono1'=>'required|string',
           'telefono2'=>'nullable|string',
           'direccion'=>'required|string',
           'email'=>'required|string',
           
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Presupuesto",
                    'datos' => $validator
                ],500);
        }
        $presupuesto = Presupuesto::create([
            
            'tipodedocumento' => $request->input('tipodedocumento' ),
            'nroidentificacion' => $request->input('nroidentificacion' ),
            'razonsocial' => $request->input('razonsocial' ),
            'telefono1' => $request->input('telefono1' ),
            'telefono2' => $request->input('telefono2' ),
            'direccion' => $request->input('direccion' ),
            'email' => $request->input('email' ),
        ]);

          return response()->json($presupuesto);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Presupuesto $presupuesto)
    {
        //
         $presupuesto = Presupuesto::findOrFail($presupuesto);
         return response()->json($presupuesto);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $presupuesto)
    {
        //
         $validator = Validator::make($request->all(), [
           
           'tipodedocumento'=>'required|srting',
           'nroidentificacion'=>'required|string',
           'razonsocial'=>'required|string',
           'telefono1'=>'required|string',
           'telefono2'=>'nullable|string',
           'direccion'=>'required|string',
           'email'=>'required|string',
           
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Presupuesto",
                    'datos' => $validator
                ],500);
        }
        $presupuesto = Presupuesto::findOrFail($presupuesto);
        
        $presupuesto->tipodedocumento= $request->input('tipodedocumento' );
        $presupuesto->nroidentificacion= $request->input('nroidentificacion' );
        $presupuesto->razonsocial= $request->input('razonsocial' );
        $presupuesto->telefono1= $request->input('telefono1' );
        $presupuesto->telefono2= $request->input('telefono2' );
        $presupuesto->direccion= $request->input('direccion' );
        $presupuesto->email= $request->input('email' );
        
        $presupuesto->save();
        return response()->json($presupuesto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presupuesto $presupuesto)
    {
        //
        $presupuesto->delete();
        $presupuesto = Presupuesto::all();
        return response()->json($presupuesto);
    }
}

<?php

namespace App\Http\Controllers;

use App\Natural;
use Illuminate\Http\Request;

class NaturalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $natural = Natural::all();
        return response()->json([
            'success' => "Personas Naturales Listadas",
            'content' => $natural
        ],200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




        public function create(){ 
        

        }


    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
           
           'tipodedocumento'=>'required|srting',
           'cedula' => 'required|unique:naturales,cedula,',
           'nombre'=>'required|string',
           'apellido'=>'required|string',
           'fechanacimiento'=>'required|date',
           'genero'=>'required|string',
           
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Natural",
                    'datos' => $validator
                ],500);
        }
        $natural = Natural::create([
            
            'tipodedocumento' => $request->input('tipodedocumento' ),
            'cedula' => $request->input('cedula' ),
            'nombre' => $request->input('nombre' ),
            'apellido' => $request->input('apellido' ),
            'fechanacimiento' => $request->input('fechanacimiento' ),
            'genero' => $request->input('genero' ),
            'id_user' =>  auth()->user()->id,
        ]);

          return response()->json($natural);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Natural  $natural
     * @return \Illuminate\Http\Response
     */
    public function show(Natural $natural)
    {
        //
         $natural = Natural::findOrFail($natural);
         return response()->json($natural);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Natural  $natural
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Natural $natural)
    {
        //
         $validator = Validator::make($request->all(), [
           
           'tipodedocumento'=>'required|srting',
           'cedula'=>'required|string',
           'nombre'=>'required|string',
           'apellido'=>'required|string',
           'fechanacimiento'=>'required|date',
           'genero'=>'required|string',
           
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Natural",
                    'datos' => $validator
                ],500);
        }
        $natural = Natural::findOrFail($natural);
        
        $natural->tipodedocumento= $request->input('tipodedocumento' );
        $natural->cedula= $request->input('cedula' );
        $natural->nombre= $request->input('nombre' );
        $natural->apellido= $request->input('apellido' );
        $natural->fechanacimiento= $request->input('fechanacimiento' );
        $natural->genero= $request->input('genero' );
        
        $natural->save();
        return response()->json($natural);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Natural  $natural
     * @return \Illuminate\Http\Response
     */
    public function destroy(Natural $natural)
    {
        //
        $natural->delete();
        $natural = Natural::all();
        return response()->json($natural);
    }
}

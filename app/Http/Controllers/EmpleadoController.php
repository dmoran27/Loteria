<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empleado = Empleado::all();
        return response()->json([
            'success' => "Empleados Listadas",
            'content' => $empleado
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
           'id_departamento'=>'required|integer|exists:departamentos,id',
           'tipodedocumento'=>'required|srting',
           'cedula' => 'required|unique:empleados,cedula',
           'nombre'=>'required|string',
           'apellido'=>'required|string',
           'fechanacimiento'=>'required|date',
           'genero'=>'required|string',
           'cargo'=>'required|string',
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Empleado",
                    'datos' => $validator
                ],500);
        }
        $empleado = Empleado::create([
            'id_departamento' => $request->input('id_departamento' ),
            'tipodedocumento' => $request->input('tipodedocumento' ),
            'cedula' => $request->input('cedula' ),
            'nombre' => $request->input('nombre' ),
            'apellido' => $request->input('apellido' ),
            'fechanacimiento' => $request->input('fechanacimiento' ),
            'genero' => $request->input('genero' ),
            'cargo' => $request->input('cargo' ),
            'id_user' =>  auth()->user()->id,
        ]);

          return response()->json($empleado);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
         $empleado = Empleado::findOrFail($empleado);
         return response()->json($empleado);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
         $validator = Validator::make($request->all(), [
           'id_departamento'=>'required|integer|exists:departamentos,id',
           'tipodedocumento'=>'required|srting',
           'cedula' => 'required|unique:users,cedula,'.$empleado->id,
           'nombre'=>'required|string',
           'apellido'=>'required|string',
           'fechanacimiento'=>'required|date',
           'genero'=>'required|string',
           'cargo'=>'required|string',
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Empleado",
                    'datos' => $validator
                ],500);
        }
        $empleado = Empleado::findOrFail($empleado);
        $empleado->id_departamento= $request->input('id_departamento' );
        $empleado->tipodedocumento= $request->input('tipodedocumento' );
        $empleado->cedula= $request->input('cedula' );
        $empleado->nombre= $request->input('nombre' );
        $empleado->apellido= $request->input('apellido' );
        $empleado->fechanacimiento= $request->input('fechanacimiento' );
        $empleado->genero= $request->input('genero' );
        $empleado->cargo= $request->input('cargo' );
        $empleado->save();
        return response()->json($empleado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
        $empleado->delete();
        $empleado = Empleado::all();
        return response()->json($empleado);
    }
}

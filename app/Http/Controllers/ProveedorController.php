<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proveedor = Proveedor::all();
        return response()->json([
            'success' => "Personas Proveedores Listadas",
            'content' => $proveedor
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
                    'error' => "Error de datos al crear Proveedor",
                    'datos' => $validator
                ],500);
        }
        $proveedor = Proveedor::create([
            
            'tipodedocumento' => $request->input('tipodedocumento' ),
            'nroidentificacion' => $request->input('nroidentificacion' ),
            'razonsocial' => $request->input('razonsocial' ),
            'telefono1' => $request->input('telefono1' ),
            'telefono2' => $request->input('telefono2' ),
            'direccion' => $request->input('direccion' ),
            'email' => $request->input('email' ),
        ]);

          return response()->json($proveedor);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
         $proveedor = Proveedor::findOrFail($proveedor);
         return response()->json($proveedor);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
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
                    'error' => "Error de datos al crear Proveedor",
                    'datos' => $validator
                ],500);
        }
        $proveedor = Proveedor::findOrFail($proveedor);
        
        $proveedor->tipodedocumento= $request->input('tipodedocumento' );
        $proveedor->nroidentificacion= $request->input('nroidentificacion' );
        $proveedor->razonsocial= $request->input('razonsocial' );
        $proveedor->telefono1= $request->input('telefono1' );
        $proveedor->telefono2= $request->input('telefono2' );
        $proveedor->direccion= $request->input('direccion' );
        $proveedor->email= $request->input('email' );
        
        $proveedor->save();
        return response()->json($proveedor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
        $proveedor->delete();
        $proveedor = Proveedor::all();
        return response()->json($proveedor);
    }
}

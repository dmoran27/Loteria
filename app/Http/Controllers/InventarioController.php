<?php

namespace App\Http\Controllers;

use App\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inventario = Inventario::all();
        return response()->json([
            'success' => "Personas Inventarios Listadas",
            'content' => $inventario
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
           
           'material'=>'required|srting',
           'cantidaddisponible' => 'required|integer',
           'cantidadreservado'=>'required|integer',
           'id_empleado'=>'required|integer',
          
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Inventario",
                    'datos' => $validator
                ],500);
        }
        $inventario = Inventario::create([
            
            'material' => $request->input('material' ),
            'cantidaddisponible' => $request->input('cantidaddisponible' ),
            'cantidadreservado' => $request->input('cantidadreservado' ),
            'id_empleado' => $request->input('id_empleado' ),
            
        ]);

          return response()->json($inventario);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        //
         $inventario = Inventario::findOrFail($inventario);
         return response()->json($inventario);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
          $validator = Validator::make($request->all(), [
           
           'material'=>'required|srting',
           'cantidaddisponible' => 'required|integer',
           'cantidadreservado'=>'required|integer',
           'id_empleado'=>'required|integer',
          
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Inventario",
                    'datos' => $validator
                ],500);
        }
        $inventario = Inventario::findOrFail($inventario);
        
        $inventario->material= $request->input('material' );
        $inventario->cantidaddisponible= $request->input('cantidaddisponible' );
        $inventario->cantidadreservado= $request->input('cantidadreservado' );
        $inventario->id_empleado= $request->input('id_empleado' );
        $inventario->fechanacimiento= $request->input('fechanacimiento' );
        $inventario->genero= $request->input('genero' );
        
        $inventario->save();
        return response()->json($inventario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        //
        $inventario->delete();
        $inventario = Inventario::all();
        return response()->json($inventario);
    }
}

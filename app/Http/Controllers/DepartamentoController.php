<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departamento = Departamento::all();
        return response()->json([
            'success' => "Departamentos Listadas",
            'content' => $departamento
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
       
        $departamento = Departamento::create([
            'nombre' => $request->input('nombre' ),
            'descripcion' => $request->input('descripcion' ),
        ]);

          return response()->json($departamento);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        //
         $departamento = Departamento::findOrFail($departamento);
         return response()->json($departamento);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        //
       
        $departamento = Departamento::findOrFail($departamento);
        $departamento->nombre= $request->input('nombre' );
        $departamento->descripcion= $request->input('descripcion' );
        $departamento->save();
        return response()->json($departamento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        //
        $departamento->delete();
        $departamento = Departamento::all();
        return response()->json($departamento);
    }
}

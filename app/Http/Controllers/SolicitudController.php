<?php

namespace App\Http\Controllers;

use App\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $solicitud = Solicitud::all();
        return response()->json([
            'success' => " Solicitudes Listadas",
            'content' => $solicitud
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
           
           'id_proveedor'=>'nullable|srting',
           'id_tipobeneficio'=>'required|string',
           'id_institucion'=>'nullable|string',
           'id_natural'=>'nullable|string',
           'nrosolicitud'=>'nullable|string',
           'fechaexpediente'=>'nullable',
           'descripcioncaso'=>'nullable|string',
           'montopresupuesto'=>'nullable|string',
           'montoaprobado'=>'nullable|string',
           'estado'=>'required|string',
           'fechadisponible'=>'nullable',
           'fecharetiro'=>'nullable',
           
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Solicitud",
                    'datos' => $validator
                ],500);
        }
        $solicitud = Solicitud::create([
            
            'id_proveedor' => $request->input('id_proveedor' ),
            'id_tipobeneficio' => $request->input('id_tipobeneficio' ),
            'id_institucion' => $request->input('id_institucion' ),
            'id_natural' => $request->input('id_natural' ),
            'nrosolicitud' => $request->input('nrosolicitud' ),
            'fechaexpediente' => $request->input('fechaexpediente' ),
            'descripcioncaso' => $request->input('descripcioncaso' ),
            'montopresupuesto' => $request->input('montopresupuesto'),
            'montoaprobado' => $request->input('montoaprobado'),
            'estado' => $request->input('estado'),
            'fechadisponible' => $request->input('fechadisponible'),
            'fecharetiro' => $request->input('fecharetiro'),
        ]);

          return response()->json($solicitud);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        //
         $solicitud = Solicitud::findOrFail($solicitud);
         return response()->json($solicitud);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //
          $validator = Validator::make($request->all(), [
           
           'id_proveedor'=>'nullable|srting',
           'id_tipobeneficio'=>'required|string',
           'id_institucion'=>'nullable|string',
           'id_natural'=>'nullable|string',
           'nrosolicitud'=>'nullable|string',
           'fechaexpediente'=>'required|string',
           'descripcioncaso'=>'nullable|string',
           'montopresupuesto'=>'nullable|string',
           'montoaprobado'=>'nullable|string',
           'estado'=>'required|string',
           'fechadisponible'=>'nullable|string',
           'fecharetiro'=>'nullable|string',
           
        ]);
        if ($validator->fails()) { 
             return response()->json([
                    'error' => "Error de datos al crear Solicitud",
                    'datos' => $validator
                ],500);
        }
        $solicitud = Solicitud::findOrFail($solicitud);
        
        $solicitud->id_proveedor= $request->input('id_proveedor' );
        $solicitud->id_tipobeneficio= $request->input('id_tipobeneficio' );
        $solicitud->id_institucion= $request->input('id_institucion' );
        $solicitud->id_natural= $request->input('id_natural' );
        $solicitud->nrosolicitud= $request->input('nrosolicitud' );
        $solicitud->fechaexpediente= $request->input('fechaexpediente' );
        $solicitud->descripcioncaso= $request->input('descripcioncaso' );
        $solicitud->montopresupuesto= $request->input('montopresupuesto');
        $solicitud->montoaprobado= $request->input('montoaprobado');
        $solicitud->estado= $request->input('estado');
        $solicitud->fechadisponible= $request->input('fechadisponible');
        $solicitud->fecharetiro= $request->input('fecharetiro');

        
        $solicitud->save();
        return response()->json($solicitud);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
        $solicitud->delete();
        $solicitud = Solicitud::all();
        return response()->json($solicitud);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipio;
use App\Parroquia;

class ParroquiaController extends Controller
{
    //
      public function index(Request $request)
    {
        //
    	if( $request->input('municipio_id')){
    		$parroquias=Parroquia::where('municipio_id', $request->input('municipio_id'))->get()->toArray();
    		return response()->json($parroquias);	
    	}else{
    		$parroquias  = Parroquia::all();
        	return response()->json($parroquias);	
    	}
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function show(Parroquia $parroquia)
    {
        //

         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function edit(Parroquia $parroquia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parroquia $parroquia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parroquia $parroquia)
    {
        //
    }
}

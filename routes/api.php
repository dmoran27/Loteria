<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


    //Rutas a las que se permitirá acceso

        Route::resource('citas', 'citaController', ['except' => ['edit', 'create']]);
        Route::resource('departamentos', 'departamentoController', ['except' => ['edit', 'create']]);
        Route::resource('disponibilidades', 'disponibilidadController', ['except' => ['edit', 'create']]);
        Route::resource('empleados', 'EmpleadoController', ['except' => ['edit', 'create']]);
        Route::resource('organizaciones', 'OrganizacionController', ['except' => ['edit', 'create']]);
        Route::resource('inventarios', 'InventarioController', ['except' => ['edit', 'create']]);
        Route::resource('naturales', 'NaturalController', ['except' => ['edit', 'create']]);
        Route::resource('presupuestos', 'PresupuestoController', ['except' => ['edit', 'create']]);
        Route::resource('proveedores', 'ProveedorController', ['except' => ['edit', 'create']]);
        
        Route::resource('solicitudes', 'SolicitudController', ['except' => ['edit', 'create']]);
        Route::resource('tipobeneficios', 'TipoBeneficioController', ['except' => ['edit', 'create','index','show']]);
        Route::resource('usuarios', 'UserController', ['except' => ['edit', 'create']]);
        Route::resource('personaExterna', 'PersonaExternaController', ['except' => ['edit', 'create']]);
        Route::resource('entidadExterna', 'EntidadExternaController', ['except' => ['edit', 'create']]);

   

Route::resource('tipobeneficios', 'TipoBeneficioController');
Route::resource('tipoorganizacion', 'TipoOrganizacionController');
//Route::resource('clientes', 'ClienteController', ['except' => ['edit', 'create', 'index']]);
Route::get('proveedores/data-table', 'ProveedorController@getProveedoresForDataTable');
Route::resource('estados', 'EstadoController');
Route::resource('municipios', 'MunicipioController');
Route::resource('parroquias', 'ParroquiaController');




Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthPassportController@login')->name('login');
    Route::post('registro-natural', 'AuthPassportController@registroNatural');
    Route::post('registro-organizacion', 'AuthPassportController@resgistroOrganizacion');
   
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthPassportController@logout');
        Route::post('user', 'AuthPassportController@user');
    });
});


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



Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@signup');
    Route::post('registro-natural', 'AuthController@registroNatural');
    Route::post('registro-organizacion', 'AuthController@resgistroOrganizacion');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate'); //activar cuenta de usuario
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});


Route::group(['middleware' => 'auth:api'], function() {
        
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

    });

Route::resource('tipobeneficios', 'TipoBeneficioController');
Route::resource('tipoorganizacion', 'TipoOrganizacionController');
Route::resource('clientes', 'ClienteController', ['except' => ['edit', 'create', 'index']]);

Route::resource('estados', 'EstadoController');
Route::resource('municipios', 'MunicipioController');
Route::resource('parroquias', 'ParroquiaController');

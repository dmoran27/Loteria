<?php
namespace App\Http\Controllers;
use App\User;
use App\Natural;
use App\Organizacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function registroNatural(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users',
            'password' => 'required_with:password_confirmation|same:password_confirmation',
            'direccion'=> 'required|text',
            'telefono1'=> 'required|string',
            'telefono2'=> 'nullable|string',
            'estado_id'=> 'required|integer',
            'municipio_id'=> 'required|integer',
            'parroquia_id'=> 'required|integer',
            'direccion'=> 'nullable|string',
           'tipodedocumento' => 'required|string',
           'cedula' => 'required|integer|unique:naturales,cedula',
           'nombre' => 'required|string',
           'apellido' => 'required|string',
           'fechanacimiento' => 'required|date',
           'genero' => 'required|string',
        ]);
        if ($validator->fails()) {
               return response()->json($validator->errors(), 401);
        }

        $user = new User([ 
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'direccion' => $request->direccion,
            'telefono1'=> $request->telefono1,
            'telefono2'=> $request->telefono2,
            'estado_id'=> $request->estado_id,
            'municipio_id'=> $request->municipio_id,
            'parroquia_id'=> $request->parroquia_id,
        ]);

            $user->save();

    
        $user->roles()->attach(7);
       
    
        $natural = new Natural([ 
            'id_user' =>$user->id,
            'tipodedocumento' => $request->tipodedocumento,
            'cedula' => $request->cedula,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fechanacimiento' => $request->fechanacimiento,
            'genero' => $request->genero,
        ]);
        $natural->save();
        

        return response()->json([
            'message' => 'Usuario creado Exitosamente!'
        ], 200);

    }

    public function resgistroOrganizacion(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users',
            'password' => 'required_with:password_confirmation|same:password_confirmation',
            'direccion'=> 'required|text',
            'telefono1'=> 'required|string',
            'telefono2'=> 'nullable|string',
            'estado_id'=> 'required|integer',
            'municipio_id'=> 'required|integer',
            'parroquia_id'=> 'required|integer',
            'direccion'=> 'nullable|string',
           'razonsocial'=> 'required|string',
           'tipodedocumento'=> 'required|string',
           'nroidentificacion'=> 'required|string',
           'id_tipoorganizacion'=> 'required|integer',
           
        ]);
        if ($validator->fails()) {
               return response()->json($validator->errors(), 401);
        }

        $user = new User([ 
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'direccion' => $request->direccion,
            'telefono1'=> $request->telefono1,
            'telefono2'=> $request->telefono2,
            'estado_id'=> $request->estado_id,
            'municipio_id'=> $request->municipio_id,
            'parroquia_id'=> $request->parroquia_id,
        ]);

        $user->save();
        $user->roles()->attach([7]);
        $organizacion = new Organizacion([ 
            'id_user' =>$user->id,
            'tipodedocumento' => $request->tipodedocumento,
            'razonsocial' => $request->razonsocial,
            'nroidentificacion' => $request->nroidentificacion,
            'id_tipoorganizacion' => $request->id_tipoorganizacion,
            
        ]);
        $organizacion->save();
        

        return response()->json([
            'message' => 'Usuario creado Exitosamente!'
            
        ], 200);
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function signup(Request $request)
        {
      $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                    ->toDateTimeString(),
        ]);
    }


    
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Exito al cerrar sesion'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
<?php

use App\Permiso;
use Illuminate\Database\Seeder;

class PermisosTableSeeder extends Seeder
{
    public function run()
    {
        $permisos = [

/***************************Cliente***************************************/
             [
                
                'slug'      => 'cliente_crear',
                'nombre'    =>'Crear Clientes',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
            [
                
                'slug'      => 'cliente_editar',
                'nombre'    =>'Editar Clientes',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
            [
                
                'slug'      => 'cliente_mostrar',
                'nombre'    =>'Ver Clientes',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
            [
                
                'slug'      => 'cliente_eliminar',
                'nombre'    =>'Eliminar Clientes',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
            [
                
                'slug'      => 'cliente_acceder',
                'nombre'    =>'Acceder a las Clientes',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],

/***************************Rol***************************************/
            [
                
                'slug'      => 'rol_crear',
                'nombre'    =>'Crear Rols',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
            [
                
                'slug'      => 'rol_editar',
                'nombre'    =>'Editar Rols',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
            [
                
                'slug'      => 'rol_mostrar',
                'nombre'    =>'Ver Rols',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
            [
                
                'slug'      => 'rol_eliminar',
                'nombre'    =>'Eliminar Rols',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
            [
                
                'slug'      => 'rol_acceder',
                'nombre'    =>'Acceder a las Rols',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
          
/***************************usuario***************************************/
            [
                
                'slug'      => 'usuario_crear',
                'nombre'    =>'Crear Tecnicos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
            [
                
                'slug'      => 'usuario_editar',
                'nombre'    =>'Editar Tecnicos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
            [
                
                'slug'      => 'usuario_mostrar',
                'nombre'    =>'Ver Tecnicos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
            [
                
                'slug'      => 'usuario_eliminar',
                'nombre'    =>'Eliminar Tecnicos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],
            [
                
                'slug'      => 'usuario_acceder',
                'nombre'    =>'Acceder a las Tecnicos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
                'deleted_at' => null,
            ],

        ];

        Permiso::insert($permisos);
    }
}

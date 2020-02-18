<?php

use App\TipoOrganizacion;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
       







        // factory(App\TipoOrganizacion::class,10)->create();
        $tipoOrganizacion = [
            
            [ 
            'nombre' => 'Institucion educativa',
            ],
            [ 
            'nombre' => 'Ente Gubernamental',
            ],
            [ 
            'nombre' => 'Ente Privado',
            ],
            [ 
            'nombre' => 'Comercio',
            ],
        ];

        
        TipoOrganizacion::insert($tipoOrganizacion);
    }
}

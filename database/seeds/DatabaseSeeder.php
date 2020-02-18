<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       
      
        $this->call(UsersTableSeeder::class);
        $this->call(PermisosTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(VenezuelaTableSeeder::class);
        
      
        
       
    }
    protected function truncateTables(array $tables){
        
        DB::Statements('SET FOREING_KEY_CHECKS=0;');
        foreach ($tables as $tabla) {
             DB::table($tables)->truncate();

        }
        DB::Statements('SET FOREING_KEY_CHECKS=1;');

       
    }
 }

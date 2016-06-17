<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Admin
         */
        DB::table('roles')->insert([
            // id = 1
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administrador do sistema.'
        ]);

        /*
         * Fundador
         */
        DB::table('roles')->insert([
            // id = 2
            'name' => 'founder',
            'display_name' => 'Fundador',
            'description' => 'Fundador da república.'
        ]);

        /*
         * Membro
         */
        DB::table('roles')->insert([
            // id = 3
            'name' => 'member',
            'display_name' => 'Membro',
            'description' => 'Membro da república.'
        ]);

        /*
         * Tesoureiro
         */
        DB::table('roles')->insert([
            // id = 4
            'name' => 'accountant',
            'display_name' => 'Tesoureiro',
            'description' => 'Tesoureiro da república, responsável pelas contas.'
        ]);
    }
}

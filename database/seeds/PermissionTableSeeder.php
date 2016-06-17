<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // ********************************** Republics Permissions *************************** //
        // id = 1
        DB::table('permissions')->insert([
            'name' => 'manage_republics',
            'display_name' => 'Gerenciar Repúblicas'
        ]);

        // id = 2
        DB::table('permissions')->insert([
            'name' => 'edit_republics',
            'display_name' => 'Editar Repúblicas'
        ]);

        // id = 3
        DB::table('permissions')->insert([
            'name' => 'manage_rooms',
            'display_name' => 'Gerenciar quartos'
        ]);
        // ************************************************************************************ //

        // ********************************** Members Permissions *************************** //
        //id = 4
        DB::table('permissions')->insert([
            'name' => 'manage_members',
            'display_name' => 'Gerenciar Membros'
        ]);

        // id = 5
        DB::table('permissions')->insert([
            'name' => 'invite_members',
            'display_name' => 'Convidar Membros'
        ]);

        // id = 6
        DB::table('permissions')->insert([
            'name' => 'kick_members',
            'display_name' => 'Convidar Membros'
        ]);
        // ************************************************************************************ //

        // ********************************** Bills Permissions *************************** //
        // id = 7
        DB::table('permissions')->insert([
            'name' => 'manage_bills',
            'display_name' => 'Gerenciar Gastos'
        ]);

        // id = 8
        DB::table('permissions')->insert([
            'name' => 'create_bills',
            'display_name' => 'Adicionar Gasto'
        ]);

        // id = 9
        DB::table('permissions')->insert([
            'name' => 'edit_bills',
            'display_name' => 'Editar Gasto'
        ]);

        // id = 10
        DB::table('permissions')->insert([
            'name' => 'pay_bills',
            'display_name' => 'Adicionar Gasto'
        ]);
        // ************************************************************************************ //
    }
}

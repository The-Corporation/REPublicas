<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ********************************** Admin Permissions *************************** //
        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 1,
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 2,
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 4,
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 7,
        ]);
        // ************************************************************************************ //

        // ********************************** Founder Permissions *************************** //
        DB::table('permission_role')->insert([
            'role_id' => 2,
            'permission_id' => 2,
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 2,
            'permission_id' => 3,
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 2,
            'permission_id' => 4,
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 2,
            'permission_id' => 7,
        ]);
        // ************************************************************************************ //

        // ********************************** Member Permissions *************************** //
        DB::table('permission_role')->insert([
            'role_id' => 3,
            'permission_id' => 2,
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 3,
            'permission_id' => 5,
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 3,
            'permission_id' => 7,
        ]);
        // ************************************************************************************ //

        // ******************************* Accountant Permissions *************************** //
        DB::table('permission_role')->insert([
            'role_id' => 4,
            'permission_id' => 1,
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 4,
            'permission_id' => 5,
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 4,
            'permission_id' => 7,
        ]);
        // ************************************************************************************ //
    }
}

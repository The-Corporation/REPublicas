<?php

use Illuminate\Database\Seeder;
use Republicas\Republic;
use Republicas\User;

class RepublicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Republic::class, 5)->create()->each(function($rep) {
            $rep->users()->save(factory(User::class)->make());
        });
    }
}

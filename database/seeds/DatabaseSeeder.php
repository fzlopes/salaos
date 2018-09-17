<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!app()->environment('production')):
            $this->call(RolesTableSeeder::class);
            $this->call(UsersTableSeeder::class);
        endif;
    }
}

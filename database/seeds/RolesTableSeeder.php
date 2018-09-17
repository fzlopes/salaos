<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create([
            'name' => 'Super admin',
            'role' => 'SUPER_ADMIN'
        ]);

        Role::create([
            'name' => 'Admin',
            'role' => 'ADMIN'
        ]);

        Role::create([
            'name' => 'Gerente',
            'role' => 'MANAGER'
        ]);

        Role::create([
            'name' => 'Colaborador',
            'role' => 'COLLABORATOR'
        ]);

        $this->command->info('The basic roles was created.');
    }
}

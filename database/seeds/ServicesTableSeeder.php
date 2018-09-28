<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::truncate();

        Service::create([
            'name' => 'Corte Feminino'
        ]);

        Service::create([
            'name' => 'Corte Feminino e Tintura'
        ]);

        Service::create([
            'name' => 'Tintura com a tinta'
        ]);

        Service::create([
            'name' => 'Tintura sem a tinta'
        ]);

        Service::create([
            'name' => 'Corte Masculino Máquina'
        ]);

        Service::create([
            'name' => 'Corte Masculino Tesoura'
        ]);

        $this->command->info('The basic service was created.');
    }
}

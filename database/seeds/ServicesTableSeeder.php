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

        Service::create([
            'name' => 'Pé'
        ]);

        Service::create([
            'name' => 'Mão'
        ]);

        Service::create([
            'name' => 'Mão e Pé'
        ]);

        Service::create([
            'name' => 'Luzes'
        ]);

        Service::create([
            'name' => 'Progressiva'
        ]);

        Service::create([
            'name' => 'Escova'
        ]);

        Service::create([
            'name' => 'MegaHair'
        ]);

        Service::create([
            'name' => 'Chapinha'
        ]);

        $this->command->info('The basic services was created.');
    }
}

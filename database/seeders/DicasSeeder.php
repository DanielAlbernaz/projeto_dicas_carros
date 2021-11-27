<?php

namespace Database\Seeders;

use App\Models\Dica;
use Illuminate\Database\Seeder;

class DicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dica::insert([
            [
                'user_id' => 1,
                'dica_tipo_id' => 1,
                'marca' => 'Foton',
                'modelo' => 'Minitruck',
                'versao' => '3.5-12 DT',
                'text' => 'A Foton Caminhões desenvolveu para o mercado, seu leve de 10 toneladas que passa a ser o veículo com a maior capacidade de carga do segmento no País.',
                'created_at' => now()
            ],
            [
                'user_id' => 1,
                'dica_tipo_id' => 1,
                'marca' => 'Foton',
                'modelo' => 'Minitruck',
                'versao' => '3.5-14 ST',
                'text' => 'A Foton Caminhões desenvolveu para o mercado, seu leve de 10 toneladas que passa a ser o veículo com a maior capacidade de carga do segmento no País.',
                'created_at' => now()
            ],
            [
                'user_id' => 1,
                'dica_tipo_id' => 1,
                'marca' => 'Foton',
                'modelo' => 'Citytruck ',
                'versao' => '10-16 DT',
                'text' => 'A Foton Caminhões desenvolveu para o mercado, seu leve de 10 toneladas que passa a ser o veículo com a maior capacidade de carga do segmento no País.',
                'created_at' => now()
            ],
            [
                'user_id' => 2,
                'dica_tipo_id' => 1,
                'marca' => 'Hyundai',
                'modelo' => 'HR',
                'versao' => 'DA10A',
                'text' => 'A Foton Caminhões desenvolveu para o mercado, seu leve de 10 toneladas que passa a ser o veículo com a maior capacidade de carga do segmento no País.',
                'created_at' => now()
            ],
            [
                'user_id' => 2,
                'dica_tipo_id' => 1,
                'marca' => 'Hyundai',
                'modelo' => 'HR',
                'versao' => 'DA12A',
                'text' => 'A Foton Caminhões desenvolveu para o mercado, seu leve de 10 toneladas que passa a ser o veículo com a maior capacidade de carga do segmento no País.',
                'created_at' => now()
            ],
            [
                'user_id' => 3,
                'dica_tipo_id' => 1,
                'marca' => 'Hyundai',
                'modelo' => 'HR',
                'versao' => 'DA13A',
                'text' => 'A Foton Caminhões desenvolveu para o mercado, seu leve de 10 toneladas que passa a ser o veículo com a maior capacidade de carga do segmento no País.',
                'created_at' => now()
            ],
            [
                'user_id' => 3,
                'dica_tipo_id' => 2,
                'marca' => 'VW',
                'modelo' => 'Gol',
                'versao' => '',
                'text' => 'A Foton Caminhões desenvolveu para o mercado, seu leve de 10 toneladas que passa a ser o veículo com a maior capacidade de carga do segmento no País.',
                'created_at' => now()
            ],
            [
                'user_id' => 4,
                'dica_tipo_id' => 2,
                'marca' => 'VW',
                'modelo' => 'Voyage',
                'versao' => '',
                'text' => 'A Foton Caminhões desenvolveu para o mercado, seu leve de 10 toneladas que passa a ser o veículo com a maior capacidade de carga do segmento no País.',
                'created_at' => now()
            ],
            [
                'user_id' => 4,
                'dica_tipo_id' => 2,
                'marca' => 'GM',
                'modelo' => 'Corsa',
                'versao' => 'JOY',
                'text' => 'A Foton Caminhões desenvolveu para o mercado, seu leve de 10 toneladas que passa a ser o veículo com a maior capacidade de carga do segmento no País.',
                'created_at' => now()
            ],
            [
                'user_id' => 4,
                'dica_tipo_id' => 3,
                'marca' => 'HONDA',
                'modelo' => 'Twister',
                'versao' => '',
                'text' => 'A Foton Caminhões desenvolveu para o mercado, seu leve de 10 toneladas que passa a ser o veículo com a maior capacidade de carga do segmento no País.',
                'created_at' => now()
            ],
            [
                'user_id' => 4,
                'dica_tipo_id' => 3,
                'marca' => 'HONDA',
                'modelo' => 'Titan',
                'versao' => '150cc',
                'text' => 'A Foton Caminhões desenvolveu para o mercado, seu leve de 10 toneladas que passa a ser o veículo com a maior capacidade de carga do segmento no País.',
                'created_at' => now()
            ],

        ]);
    }
}

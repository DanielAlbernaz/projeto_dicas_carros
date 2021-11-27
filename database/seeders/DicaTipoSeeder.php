<?php

namespace Database\Seeders;

use App\Models\DicaTipo;
use Illuminate\Database\Seeder;

class DicaTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DicaTipo::insert([
            [
                'name' => 'Caminhão',
                'created_at' => now()
            ],
            [
                'name' => 'Carro',
                'created_at' => now()
            ],
            [
                'name' => 'Moto',
                'created_at' => now()
            ]

        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Localizacion;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposDelitos = [
            [
                'direccion' => 'Plaza de Armas, Huánuco',
                'descripcion' => 'Centro de la ciudad y lugar de eventos públicos.'
            ],
            [
                'direccion' => 'Mercado Central, Huánuco',
                'descripcion' => 'Principal mercado de la ciudad con variedad de productos.'
            ],
            [
                'direccion' => 'Avenida Alameda de los Incas, Huánuco',
                'descripcion' => 'Importante avenida comercial y residencial.'
            ],
            [
                'direccion' => 'Barrio San Luis, Huánuco',
                'descripcion' => 'Barrio residencial conocido por su tranquilidad.'
            ],
            [
                'direccion' => 'Urbanización Santa Rosa, Huánuco',
                'descripcion' => 'Zona residencial moderna con parques y áreas recreativas.'
            ],
            [
                'direccion' => 'Calle Real, Huánuco',
                'descripcion' => 'Calle histórica con importantes edificios y comercios.'
            ],
            [
                'direccion' => 'Centro Histórico, Huánuco',
                'descripcion' => 'Área con monumentos y edificios históricos.'
            ],
            [
                'direccion' => 'Zona Financiera, Huánuco',
                'descripcion' => 'Área con bancos y oficinas corporativas.'
            ],
            [
                'direccion' => 'Terminal Terrestre, Huánuco',
                'descripcion' => 'Principal estación de autobuses de la ciudad.'
            ],
            [
                'direccion' => 'Residencial San Carlos, Huánuco',
                'descripcion' => 'Conjunto habitacional con viviendas modernas.'
            ],
        ];

        Localizacion::insert($tiposDelitos);
    }
}

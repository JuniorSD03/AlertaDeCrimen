<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoDelito;

class TiposDelitosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiposDelitos = [
            ['nombre' => 'Robo', 'descripcion' => 'Acto de apoderarse ilegítimamente de una cosa ajena mediante el uso de la fuerza o intimidación.'],
            ['nombre' => 'Hurto', 'descripcion' => 'Sustracción de bienes muebles ajenos, sin emplear violencia o intimidación sobre las personas.'],
            ['nombre' => 'Asalto', 'descripcion' => 'Ataque violento contra una persona con el propósito de robarle o hacerle daño.'],
            ['nombre' => 'Homicidio', 'descripcion' => 'Acción de matar a una persona.'],
            ['nombre' => 'Violación', 'descripcion' => 'Agresión sexual en la que se obliga a una persona a tener relaciones sexuales mediante violencia o intimidación.'],
            ['nombre' => 'Secuestro', 'descripcion' => 'Privación de la libertad de una persona de manera ilegal, generalmente con el objetivo de obtener un rescate o fines delictivos.'],
            ['nombre' => 'Falsificación', 'descripcion' => 'Acción de falsificar documentos, moneda u otros objetos con el fin de engañar o defraudar.'],
            ['nombre' => 'Fraude', 'descripcion' => 'Engaño hecho con ánimo de lucro, generalmente mediante la manipulación de información o documentos.'],
            ['nombre' => 'Tráfico de drogas', 'descripcion' => 'Comercio ilegal de sustancias estupefacientes o psicotrópicas.'],
            ['nombre' => 'Violencia doméstica', 'descripcion' => 'Abuso físico, emocional o sexual perpetrado por un miembro de la familia o conviviente.'],
        ];

        TipoDelito::insert($tiposDelitos);
    }
}

<?php

use Illuminate\Database\Seeder;

class AromasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder aromas
        DB::table('aromas')->insert([
            \App\Aroma::create(array('nombre' => 'Tierra')),
            \App\Aroma::create(array('nombre' => 'Papa')),
            \App\Aroma::create(array('nombre' => 'Arveja')),
            \App\Aroma::create(array('nombre' => 'Pepino')),
            \App\Aroma::create(array('nombre' => 'Paja')),
            \App\Aroma::create(array('nombre' => 'Pepino')),
            \App\Aroma::create(array('nombre' => 'Clavo de olor')),
            \App\Aroma::create(array('nombre' => 'Pimienta')),
            \App\Aroma::create(array('nombre' => 'Grano de cilantro')),
            \App\Aroma::create(array('nombre' => 'Vainilla ')),
            \App\Aroma::create(array('nombre' => 'Rosa té')),
            \App\Aroma::create(array('nombre' => 'Flor del cafeto')),
            \App\Aroma::create(array('nombre' => 'Cereza del cafeto')),
            \App\Aroma::create(array('nombre' => 'Grano de grosella negra')),
            \App\Aroma::create(array('nombre' => 'Limón')),
            \App\Aroma::create(array('nombre' => 'Albaricoque')),
            \App\Aroma::create(array('nombre' => 'Manzana')),
            \App\Aroma::create(array('nombre' => 'Mantequilla fresca')),
            \App\Aroma::create(array('nombre' => 'Nota melosa')),
            \App\Aroma::create(array('nombre' => 'Cuero')),
            \App\Aroma::create(array('nombre' => 'Arroz basmanti')),
            \App\Aroma::create(array('nombre' => 'Pan tostado')),
            \App\Aroma::create(array('nombre' => 'Malta')),
            \App\Aroma::create(array('nombre' => 'Nota de regaliz')),
            \App\Aroma::create(array('nombre' => 'Caramelo')),
            \App\Aroma::create(array('nombre' => 'Chocolate amargo')),
            \App\Aroma::create(array('nombre' => 'Almendra tostada')),
            \App\Aroma::create(array('nombre' => 'Cacahuete tostado')),
            \App\Aroma::create(array('nombre' => 'Avellana tostada')),
            \App\Aroma::create(array('nombre' => 'Nuez')),
            \App\Aroma::create(array('nombre' => 'Aves asadas')),
            \App\Aroma::create(array('nombre' => 'Olor ahumado')),
            \App\Aroma::create(array('nombre' => 'Tabaco')),
            \App\Aroma::create(array('nombre' => 'Café tostado')),
            \App\Aroma::create(array('nombre' => 'Nota medicinal')),
            \App\Aroma::create(array('nombre' => 'Caucho'))
        ]);
    }
}

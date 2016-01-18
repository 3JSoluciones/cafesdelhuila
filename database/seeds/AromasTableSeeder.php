<?php

use Illuminate\Database\Seeder;
use App\Aroma;

class AromasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

            Aroma::create(array('nombre' => 'Tierra'));
            Aroma::create(array('nombre' => 'Papa'));
            Aroma::create(array('nombre' => 'Arveja'));
            Aroma::create(array('nombre' => 'Pepino'));
            Aroma::create(array('nombre' => 'Paja'));
            Aroma::create(array('nombre' => 'Pepino'));
            Aroma::create(array('nombre' => 'Clavo de olor'));
            Aroma::create(array('nombre' => 'Pimienta'));
            Aroma::create(array('nombre' => 'Grano de cilantro'));
            Aroma::create(array('nombre' => 'Vainilla '));
            Aroma::create(array('nombre' => 'Rosa té'));
            Aroma::create(array('nombre' => 'Flor del cafeto'));
            Aroma::create(array('nombre' => 'Cereza del cafeto'));
            Aroma::create(array('nombre' => 'Grano de grosella negra'));
            Aroma::create(array('nombre' => 'Limón'));
            Aroma::create(array('nombre' => 'Albaricoque'));
            Aroma::create(array('nombre' => 'Manzana'));
            Aroma::create(array('nombre' => 'Mantequilla fresca'));
            Aroma::create(array('nombre' => 'Nota melosa'));
            Aroma::create(array('nombre' => 'Cuero'));
            Aroma::create(array('nombre' => 'Arroz basmanti'));
            Aroma::create(array('nombre' => 'Pan tostado'));
            Aroma::create(array('nombre' => 'Malta'));
            Aroma::create(array('nombre' => 'Nota de regaliz'));
            Aroma::create(array('nombre' => 'Caramelo'));
            Aroma::create(array('nombre' => 'Chocolate amargo'));
            Aroma::create(array('nombre' => 'Almendra tostada'));
            Aroma::create(array('nombre' => 'Cacahuete tostado'));
            Aroma::create(array('nombre' => 'Avellana tostada'));
            Aroma::create(array('nombre' => 'Nuez'));
            Aroma::create(array('nombre' => 'Aves asadas'));
            Aroma::create(array('nombre' => 'Olor ahumado'));
            Aroma::create(array('nombre' => 'Tabaco'));
            Aroma::create(array('nombre' => 'Café tostado'));
            Aroma::create(array('nombre' => 'Nota medicinal'));
            Aroma::create(array('nombre' => 'Caucho'));
    }
}

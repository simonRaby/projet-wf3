<?php

use App\Model\Partner;
use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data[0]= [
            'name' => 'A ton étoile',
            'tel' => '05.46.42.38.80',
            'address' => '13 Rue Saint-Nicolas',
            'ville_insee' => '17300',
        ];
        $data[1]= [
            'name' => 'Boutique Aigle',
            'tel' => '05.46.41.45.93',
            'address' => '25 Rue Saint-Yon',
            'ville_insee' => '17300',
        ];
        $data[2]= [
            'name' => 'Promod',
            'tel' => '05.46.41.45.84',
            'address' => '13 Rue du Temple',
            'ville_insee' => '17300',
        ];
        $data[3]= [
            'name' => 'Harry\'s Boutique',
            'tel' => '05.46.41.01.51',
            'address' => '23 Rue Des GentilsHomme',
            'ville_insee' => '17300',
        ];
        $data[4]= [
            'name' => 'La Station Lifestyle',
            'tel' => '05.46.41.09.16',
            'address' => '38 Rue Du Minage',
            'ville_insee' => '17300',
        ];
        $data[5]= [
            'name' => 'Les Soeurs Chiffons',
            'tel' => '09.83.55.53.11',
            'address' => '11 Rue Chaudrier',
            'ville_insee' => '17300',
        ];

        for($i=0; $i< count($data); $i++){
            Partner::insert($data[$i]);
        }
    }
}

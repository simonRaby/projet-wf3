<?php

use App\Model\Gender;
use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data[0]= [
            'label' => 'Homme',
            'created_at'     => now(),
        ];
        $data[1]= [
            'label' => 'Femme',
            'created_at'     => now(),
        ];
        $data[2]= [
            'label' => 'Autres',
            'created_at'     => now(),
        ];

        for($i=0; $i <3; $i++){
            Gender::insert($data[$i]);
        }
    }
}

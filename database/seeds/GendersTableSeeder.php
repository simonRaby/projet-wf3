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
            'name' => 'Homme',
        ];
        $data[1]= [
            'name' => 'Femme',
        ];
        $data[2]= [
            'name' => 'Autres',
        ];

        for($i=0; $i <3; $i++){
            Gender::insert($data[$i]);
        }
    }
}

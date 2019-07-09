<?php

use App\Model\Marque;
use Illuminate\Database\Seeder;

class MarqueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data[0]=[
           'label' => 'Nike'
       ];
        $data[1]=[
            'label' => 'Adidas'
        ];
        $data[2]=[
            'label' => 'Pumas'
        ];
        $data[3]=[
            'label' => 'Levis'
        ];
        $data[4]=[
            'label' => 'Kaporal'
        ];
        $data[5]=[
            'label' => 'Gucci'
        ];
        $data[6]=[
            'label' => 'Louis Viton'
        ];
        $data[7]=[
            'label' => 'O\'Neill'
        ];
        $data[8]=[
            'label' => 'Quisilver'
        ];
        $data[9]=[
            'label' => 'Reebok'
        ];
        $data[10]=[
            'label' => 'Umbro'
        ];




       for($i=0; $i<11; $i++){
           Marque::insert($data[$i]);
       }
    }
}

<?php

use App\Model\Color;
use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data[0]=[
           'color' => 'Bleu'
       ];
        $data[1]=[
            'color' => 'Blanc'
        ];
        $data[2]=[
            'color' => 'Rouge'
        ];
        $data[3]=[
            'color' => 'Vert'
        ];
        $data[4]=[
            'color' => 'Orange'
        ];
        $data[5]=[
            'color' => 'Marron'
        ];
        $data[6]=[
            'color' => 'Gris'
        ];
        $data[7]=[
            'color' => 'Noir'
        ];
        $data[8]=[
            'color' => 'Violet'
        ];
        $data[9]=[
            'color' => 'Rose'
        ];
        $data[10]=[
            'color' => 'Jaune'
        ];






       for($i =0; $i <11; $i++){
           Color::insert($data[$i]);
       }
    }
}

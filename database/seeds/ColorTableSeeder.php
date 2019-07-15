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
            'label' => 'Bleu',
            'created_at'     => now(),
        ];
        $data[1]=[
            'label' => 'Blanc',
            'created_at'     => now(),
        ];
        $data[2]=[
            'label' => 'Rouge',
            'created_at'     => now(),
        ];
        $data[3]=[
            'label' => 'Vert',
            'created_at'     => now(),
        ];
        $data[4]=[
            'label' => 'Orange',
            'created_at'     => now(),
        ];
        $data[5]=[
            'label' => 'Marron',
            'created_at'     => now(),
        ];
        $data[6]=[
            'label' => 'Gris',
            'created_at'     => now(),
        ];
        $data[7]=[
            'label' => 'Noir',
            'created_at'     => now(),
        ];
        $data[8]=[
            'label' => 'Violet',
            'created_at'     => now(),
        ];
        $data[9]=[
            'label' => 'Rose',
            'created_at'     => now(),
        ];
        $data[10]=[
            'label' => 'Jaune',
            'created_at'     => now(),
        ];






        for($i =0; $i <11; $i++){
            Color::insert($data[$i]);
        }
    }
}

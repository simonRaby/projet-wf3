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
           'label' => 'Nike',
           'created_at'     => now(),
       ];
        $data[1]=[
            'label' => 'Adidas',
            'created_at'     => now(),
        ];
        $data[2]=[
            'label' => 'Pumas',
            'created_at'     => now(),
        ];
        $data[3]=[
            'label' => 'Levis',
            'created_at'     => now(),
        ];
        $data[4]=[
            'label' => 'Kaporal',
            'created_at'     => now(),
        ];
        $data[5]=[
            'label' => 'Gucci',
            'created_at'     => now(),
        ];
        $data[6]=[
            'label' => 'Louis Viton',
            'created_at'     => now(),
        ];
        $data[7]=[
            'label' => 'O\'Neill',
            'created_at'     => now(),
        ];
        $data[8]=[
            'label' => 'Quisilver',
            'created_at'     => now(),
        ];
        $data[9]=[
            'label' => 'Reebok',
            'created_at'     => now(),
        ];
        $data[10]=[
            'label' => 'Umbro',
            'created_at'     => now(),
        ];




       for($i=0; $i<11; $i++){
           Marque::insert($data[$i]);
       }
    }
}

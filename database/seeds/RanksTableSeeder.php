<?php

use App\Model\Rank;
use Illuminate\Database\Seeder;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[0]=[
            'label' => 'etagère n°1',
            'created_at'     => now(),
        ];
        $data[1]=[
            'label' => 'etagère n°2',
            'created_at'     => now(),
        ];
        $data[2]=[
            'label' => 'etagère n°3',
            'created_at'     => now(),
        ];
        $data[3]=[
            'label' => 'etagère n°4',
            'created_at'     => now(),
        ];
        $data[4]=[
            'label' => 'etagère n°5',
            'created_at'     => now(),
        ];
        $data[5]=[
            'label' => 'etagère n°6',
            'created_at'     => now(),
        ];
        $data[6]=[
            'label' => 'etagère n°7',
            'created_at'     => now(),
        ];
        $data[7]=[
            'label' => 'etagère n°8',
            'created_at'     => now(),
        ];
        $data[8]=[
            'label' => 'etagère n°9',
            'created_at'     => now(),
        ];




        for($i=0; $i <9; $i++){
            Rank::insert($data[$i]);
        }
    }
}

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
        ];
        $data[1]=[
            'label' => 'etagère n°2',
        ];
        $data[2]=[
            'label' => 'etagère n°3',
        ];
        $data[3]=[
            'label' => 'etagère n°4',
        ];
        $data[4]=[
            'label' => 'etagère n°5',
        ];
        $data[5]=[
            'label' => 'etagère n°6',
        ];
        $data[6]=[
            'label' => 'etagère n°7',
        ];
        $data[7]=[
            'label' => 'etagère n°8',
        ];
        $data[8]=[
            'label' => 'etagère n°9',
        ];




        for($i=0; $i <9; $i++){
            Rank::insert($data[$i]);
        }
    }
}

<?php

use App\Model\status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[0] =[
            'label'         => 'En Attente',
            'created_at'     => now(),
        ];
        $data[1] =[
            'label'         => 'rejeté',
            'created_at'     => now(),
        ];
        $data[2] =[
            'label'         => 'Collecté',
            'created_at'     => now(),
        ];






        for($i=0;$i < count($data);$i++){
            Status::insert($data[$i]);
        }
    }
}

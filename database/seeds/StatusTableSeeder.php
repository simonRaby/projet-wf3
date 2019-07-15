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
            'label'         => 'waiting',
            'created_at'     => now(),
        ];
        $data[1] =[
            'label'         => 'rejected',
            'created_at'     => now(),
        ];
        $data[2] =[
            'label'         => 'Collected',
            'created_at'     => now(),
        ];






        for($i=0;$i < count($data);$i++){
            Status::insert($data[$i]);
        }
    }
}

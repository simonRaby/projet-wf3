<?php

use App\Model\Collect;
use Illuminate\Database\Seeder;

class CollectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data[0] =[
            'partner_id'    => 1,
            'status_id'     => 2,
            'collected_at'       => now(),
            'created_at'     => now(),
        ];
        $data[1] =[
            'partner_id'    => 4,
            'status_id'     => 3,
            'collected_at'       => now(),
            'created_at'     => now(),
        ];






        for($i=0;$i < count($data);$i++){
            Collect::insert($data[$i]);
        }
    }
}

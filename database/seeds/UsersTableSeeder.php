<?php

use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data[0]=[
           'role_id' => '1',
           'firstname' => 'Admin',
           'lastname' => 'ESO',
           'email' => 'admin.eso@gmail.com',
           'password' => hash::make('0000'),
           'created_at'     => now(),
       ];
        $data[1]=[
            'role_id' => '2',
            'firstname' => 'Membre',
            'lastname' => 'ESO',
            'email' => 'membre.eso@gmail.com',
            'password' => hash::make('0000'),
            'created_at'     => now(),
        ];
//        $data[2]=[
//            'partner_id' => '2',
//            'role_id' => '3',
//            'firstname' => 'Boutique',
//            'lastname' => 'Aigle',
//            'email' => 'boutique.aigle@gmail.com',
//            'password' => hash::make('0000'),
//            'created_at'     => now(),
//        ];
//        $data[3]=[
//            'partner_id' => '4',
//            'role_id' => '3',
//            'firstname' => 'Harrys',
//            'lastname' => 'Boutique',
//            'email' => 'Harrys.Boutique@gmail.com',
//            'password' => hash::make('0000'),
//            'created_at'     => now(),
//        ];






        for($i=0; $i <2; $i++){
            User::insert($data[$i]);
        }
    }
}

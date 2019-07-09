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
           'roles_id' => '1',
           'firstname' => 'Admin',
           'lastname' => 'ESO',
           'email' => 'admin.eso@gmail.com',
           'password' => hash::make('0000'),
       ];
        $data[1]=[
            'roles_id' => '2',
            'firstname' => 'Membre',
            'lastname' => 'ESO',
            'email' => 'membre.eso@gmail.com',
            'password' => hash::make('0000'),
        ];
        $data[2]=[
            'partners_id' => '2',
            'roles_id' => '3',
            'firstname' => 'Boutique',
            'lastname' => 'Aigle',
            'email' => 'boutique.aigle@gmail.com',
            'password' => hash::make('0000'),
        ];
        $data[3]=[
            'partners_id' => '4',
            'roles_id' => '3',
            'firstname' => 'Harrys',
            'lastname' => 'Boutique',
            'email' => 'Harrys.Boutique@gmail.com',
            'password' => hash::make('0000'),
        ];






        for($i=0; $i <4; $i++){
            User::insert($data[$i]);
        }
    }
}

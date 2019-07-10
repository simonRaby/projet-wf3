<?php

use App\Model\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[0]=[
            'labelle' => 'Admin',
            'description' => 'Il a tous les accès, peut gerer les users, partenaires, QrCodes, etc...',
        ];
        $data[1]=[
            'labelle' => 'Membres',
            'description' => 'Ils sont les Membres de L\'association,ils ont accès auu collect ainsi qu\'au Stock',
        ];
        $data[2]=[
            'labelle' => 'Partenaire',
            'description' => 'Ils Sont less partenaires qui fournissent l\'association, ils peuvent laisser un message qui indique que l\'association a une collecte a faire ',
        ];




        for($i=0; $i <3; $i++){
            Role::insert($data[$i]);
        }
    }
}

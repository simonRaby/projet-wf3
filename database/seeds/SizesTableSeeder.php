<?php

use App\Model\Size;
use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data[0]=[
           'categories_id' => '1',
           'size' => '38',
       ];
        $data[1]=[
            'categories_id' => '1',
            'size' => '39',
        ];
        $data[2]=[
            'categories_id' => '1',
            'size' => '40',
        ];
        $data[3]=[
            'categories_id' => '1',
            'size' => '41',
        ];
        $data[4]=[
            'categories_id' => '1',
            'size' => '42',
        ];
        $data[5]=[
            'categories_id' => '1',
            'size' => '43',
        ];
        $data[6]=[
            'categories_id' => '1',
            'size' => '44',
        ];
        $data[7]=[
            'categories_id' => '2',
            'size' => 'S',
        ];
        $data[8]=[
            'categories_id' => '2',
            'size' => 'M',
        ];
        $data[9]=[
            'categories_id' => '2',
            'size' => 'L',
        ];
        $data[10]=[
            'categories_id' => '2',
            'size' => 'XL',
        ];
        $data[11]=[
            'categories_id' => '3',
            'size' => '38',
        ];
        $data[12]=[
            'categories_id' => '3',
            'size' => '39',
        ];
        $data[13]=[
            'categories_id' => '3',
            'size' => '40',
        ];
        $data[14]=[
            'categories_id' => '3',
            'size' => '41',
        ];
        $data[15]=[
            'categories_id' => '3',
            'size' => '42',
        ];
        $data[16]=[
            'categories_id' => '3',
            'size' => '43',
        ];
        $data[17]=[
            'categories_id' => '3',
            'size' => '44',
        ];
        $data[18]=[
            'categories_id' => '3',
            'size' => '45',
        ];
        $data[19]=[
            'categories_id' => '4',
            'size' => 'S',
        ];
        $data[20]=[
            'categories_id' => '4',
            'size' => 'M',
        ];
        $data[21]=[
            'categories_id' => '4',
            'size' => 'L',
        ];
        $data[22]=[
            'categories_id' => '4',
            'size' => 'XL',
        ];

        $data[23]=[
            'categories_id' => '5',
            'size' => '35',
        ];
        $data[24]=[
            'categories_id' => '5',
            'size' => '36',
        ];
        $data[25]=[
            'categories_id' => '5',
            'size' => '37',
        ];
        $data[26]=[
            'categories_id' => '5',
            'size' => '38',
        ];
        $data[27]=[
            'categories_id' => '5',
            'size' => '39',
        ];
        $data[28]=[
            'categories_id' => '5',
            'size' => '40',
        ];
        $data[29]=[
            'categories_id' => '5',
            'size' => '41',
        ];
        $data[30]=[
            'categories_id' => '5',
            'size' => '42',
        ];
        $data[31]=[
            'categories_id' => '5',
            'size' => '43',
        ];
        $data[32]=[
            'categories_id' => '5',
            'size' => '44',
        ];
        $data[33]=[
            'categories_id' => '5',
            'size' => '45',
        ];
        $data[34]=[
            'categories_id' => '5',
            'size' => '46',
        ];
        $data[35]=[
            'categories_id' => '5',
            'size' => '47',
        ];


        $data[36]=[
            'categories_id' => '6',
            'size' => '34-38',
        ];
        $data[37]=[
            'categories_id' => '6',
            'size' => '38-42',
        ];
        $data[38]=[
            'categories_id' => '6',
            'size' => '42-46',
        ];

        $data[39]=[
            'categories_id' => '6',
            'size' => '46-50',
        ];
        $data[40]=[
            'categories_id' => '7',
            'size' => '53',
        ];
        $data[41]=[
            'categories_id' => '7',
            'size' => '54',
        ];
        $data[42]=[
            'categories_id' => '7',
            'size' => '55',
        ];
        $data[43]=[
            'categories_id' => '7',
            'size' => '56',
        ];
        $data[44]=[
            'categories_id' => '7',
            'size' => '57',
        ];
        $data[45]=[
            'categories_id' => '7',
            'size' => '58',
        ];
        $data[46]=[
            'categories_id' => '7',
            'size' => '59',
        ];
        $data[47]=[
            'categories_id' => '7',
            'size' => '60',
        ];
        $data[48]=[
            'categories_id' => '7',
            'size' => '61',
        ];
        $data[49]=[
            'categories_id' => '7',
            'size' => '62',
        ];
        $data[50]=[
            'categories_id' => '7',
            'size' => '63',
        ];
        $data[51]=[
            'categories_id' => '7',
            'size' => '64',
        ];


        $data[52]=[
            'categories_id' => '8',
            'size' => 'Taille 4',
        ];
        $data[53]=[
            'categories_id' => '8',
            'size' => 'Taille 5',
        ];
        $data[54]=[
            'categories_id' => '8',
            'size' => 'Taille 6',
        ];
        $data[55]=[
            'categories_id' => '8',
            'size' => 'Taille 7',
        ];
        $data[56]=[
            'categories_id' => '8',
            'size' => 'Taille 8',
        ];













        for($i=0; $i <57; $i++){
            Size::insert($data[$i]);
        }
    }
}

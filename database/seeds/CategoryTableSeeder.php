<?php

use App\Model\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data[0]= [
          'name' => 'Pantalon',
      ];
      $data[1]= [
          'name' => 'Tee-Shirt',
      ];
      $data[2]= [
          'name' => 'Short',
      ];
      $data[3]= [
          'name' => 'Sweet',
       ];
      $data[4]= [
          'name' => 'Chaussure',
      ];
      $data[5]= [
          'name' => 'Chaussette',
      ];
      $data[6]= [
          'name' => 'Casquette',
      ];
      $data[7]= [
          'name' => 'Echarpe',
      ];




      for($i=0; $i <8; $i++){
          Category::insert($data[$i]);
      }
    }
}

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
          'created_at'     => now(),
      ];
      $data[1]= [
          'name' => 'Tee-Shirt',
          'created_at'     => now(),
      ];
      $data[2]= [
          'name' => 'Short',
          'created_at'     => now(),
      ];
      $data[3]= [
          'name' => 'Sweet',
          'created_at'     => now(),
       ];
      $data[4]= [
          'name' => 'Chaussure',
          'created_at'     => now(),
      ];
      $data[5]= [
          'name' => 'Chaussette',
          'created_at'     => now(),
      ];
      $data[6]= [
          'name' => 'Casquette',
          'created_at'     => now(),
      ];
      $data[7]= [
          'name' => 'Echarpe',
          'created_at'     => now(),
      ];




      for($i=0; $i <8; $i++){
          Category::insert($data[$i]);
      }
    }
}

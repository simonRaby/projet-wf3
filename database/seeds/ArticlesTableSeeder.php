<?php

use App\Model\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data[0]= [
           'rank_id'        => 1,
           'category_id'    => 2,
           'marque_id'      => 5,
           'gender_id'      => 1,
           'collect_id'     => 1,
           'name'           => 'Tee-shirt Kaporal',
           'created_at'     => now(),
           ];
        $data[1]= [
            'rank_id'        => 2,
           'category_id'    => 1,
           'marque_id'      => 2,
           'gender_id'      => 1,
           'collect_id'     => 1,
           'name'           => 'Pantalon  Adidas',
            'created_at'     => now(),
           ];
        $data[2]= [
            'rank_id'        => 1,
           'category_id'    => 2,
           'marque_id'      => 1,
           'gender_id'      => 2,
           'collect_id'     => 1,
           'name'           => 'Tee-shirt Nike',
            'created_at'     => now(),
           ];
        $data[3]= [
            'rank_id'        => 2,
           'category_id'    => 1,
           'marque_id'      => 4,
           'gender_id'      => 2,
           'collect_id'     => 2,
           'name'           => 'Tee-shirt Levis',
            'created_at'     => now(),
           ];
        $data[4]= [
            'rank_id'        => 3,
           'category_id'    => 4,
           'marque_id'      => 9,
           'gender_id'      => 2,
           'collect_id'     => 1,
           'name'           => 'Sweet Quisilver',
            'created_at'     => now(),
           ];




        for($i=0; $i < count($data);$i++){
            Article::insert($data[$i]);
        }
    }

}

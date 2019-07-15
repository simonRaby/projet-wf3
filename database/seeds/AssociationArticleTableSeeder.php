<?php

use App\Model\AssociationArticle;
use Illuminate\Database\Seeder;

class AssociationArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[0]= [
            'article_id'        => 1,
            'size_id'           => 8,
            'color_id'          => 2,
            'quantity'          => 4,
            'quantity_collected'    => 4,
            'stock'             =>4,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[1]= [
            'article_id'        => 1,
            'size_id'           => 7,
            'color_id'          => 2,
            'quantity'          => 4,
            'quantity_collected'    => 4,
            'stock'             =>4,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[2]= [
            'article_id'        => 1,
            'size_id'           => 9,
            'color_id'          => 2,
            'quantity'          => 1,
            'quantity_collected'    => 1,
            'stock'             =>1,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[3]= [
            'article_id'        => 1,
            'size_id'           => 10,
            'color_id'          => 7,
            'quantity'          => 3,
            'quantity_collected'    => 3,
            'stock'             =>3,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[4]= [
            'article_id'        => 1,
            'size_id'           => 11,
            'color_id'          => 7,
            'quantity'          => 5,
            'quantity_collected'    => 5,
            'stock'             =>5,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];



        $data[5]= [
            'article_id'        => 2,
            'size_id'           => 4,
            'color_id'          => 1,
            'quantity'          => 8,
            'quantity_collected'    => 8,
            'stock'             => 8,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[6]= [
            'article_id'        => 2,
            'size_id'           => 5,
            'color_id'          => 1,
            'quantity'          => 10,
            'quantity_collected'    => 10,
            'stock'             => 10,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[7]= [
            'article_id'        => 2,
            'size_id'           => 6,
            'color_id'          => 1,
            'quantity'          => 4,
            'quantity_collected'    => 4,
            'stock'             => 4,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[8]= [
            'article_id'        => 2,
            'size_id'           => 3,
            'color_id'          => 4,
            'quantity'          => 6,
            'quantity_collected'    => 6,
            'stock'             => 6,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[9]= [
            'article_id'        => 2,
            'size_id'           => 4,
            'color_id'          => 4,
            'quantity'          => 8,
            'quantity_collected'    => 8,
            'stock'             => 8,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[10]= [
            'article_id'        => 2,
            'size_id'           => 5,
            'color_id'          => 4,
            'quantity'          => 5,
            'quantity_collected'    => 5,
            'stock'             => 5,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];





        $data[11]= [
            'article_id'    => 3,
            'size_id'       => 10,
            'color_id'      => 2,
            'quantity'      => 10,
            'is_rejected'   => true,
            'created_at'         => now(),
        ];
        $data[12]= [
            'article_id'    => 3,
            'size_id'       => 9,
            'color_id'      => 2,
            'quantity'      => 7,
            'is_rejected'   => true,
            'created_at'         => now(),
        ];
        $data[13]= [
            'article_id'        => 3,
            'size_id'           => 8,
            'color_id'          => 1,
            'quantity'          => 6,
            'quantity_collected'    => 6,
            'stock'             => 6,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[14]= [
            'article_id'        => 3,
            'size_id'           => 9,
            'color_id'          => 1,
            'quantity'          => 7,
            'quantity_collected'    => 7,
            'stock'             => 7,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[15]= [
            'article_id'    => 3,
            'size_id'       => 11,
            'color_id'      => 9,
            'quantity'      => 2,
            'is_rejected'   => true,
            'created_at'         => now(),
        ];





        $data[16]= [
            'article_id'    => 4,
            'size_id'       => 5,
            'color_id'      => 6,
            'quantity'      => 6,
            'is_rejected'   => true,
            'created_at'         => now(),
        ];
        $data[17]= [
            'article_id'    => 4,
            'size_id'       => 6,
            'color_id'      => 6,
            'quantity'      => 10,
            'is_rejected'   => true,
            'created_at'         => now(),
        ];
        $data[18]= [
            'article_id'    => 4,
            'size_id'       => 7,
            'color_id'      => 1,
            'quantity'      => 8,
            'is_rejected'   => true,
            'created_at'         => now(),
        ];





        $data[19]= [
            'article_id'        => 5,
            'size_id'           => 20,
            'color_id'          => 7,
            'quantity'          => 6,
            'quantity_collected'    => 6,
            'stock'             => 6,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[20]= [
            'article_id'        => 5,
            'size_id'           => 21,
            'color_id'          => 7,
            'quantity'          => 5,
            'quantity_collected'    => 5,
            'stock'             => 5,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[21]= [
            'article_id'        => 5,
            'size_id'           => 22,
            'color_id'          => 7,
            'quantity'          => 9,
            'quantity_collected'    => 9,
            'stock'             => 9,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[22]= [
            'article_id'        => 5,
            'size_id'           => 23,
            'color_id'          => 8,
            'quantity'          => 3,
            'quantity_collected'    => 3,
            'stock'             => 3,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];
        $data[23]= [
            'article_id'        => 5,
            'size_id'           => 24,
            'color_id'          => 8,
            'quantity'          => 5,
            'quantity_collected'    => 5,
            'stock'             => 5,
            'is_collected'      =>true,
            'created_at'         => now(),
        ];




        for($i=0; $i < 24;$i++){
            AssociationArticle::insert($data[$i]);
        }
    }
}

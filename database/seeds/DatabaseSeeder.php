<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GendersTableSeeder::class);
        $this->call(CollectsTableSeeder::class);
        $this->call(MarqueTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RanksTableSeeder::class);
        $this->call(ColorTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
//        $this->call(AssociationArticleTableSeeder::class)
        $this->call(ArticlesTableSeeder::class);
    }
}

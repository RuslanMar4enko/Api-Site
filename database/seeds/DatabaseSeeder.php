<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $tables = [
            'articles',
            'categories',
            'characteristics',
//            'additional_characteristics',
            'widgets',
            'types',
            'assets',
            'colors',
            'products',
        ];

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        $this->call(ArticlesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CharacteristicsTableSeeder::class);
//        $this->call(AdditionalCharacteristicsTableSeeder::class);
        $this->call(WidgetsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(AssetsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);

    }
}

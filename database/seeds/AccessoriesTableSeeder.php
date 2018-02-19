<?php

use App\Accessory;
use Illuminate\Database\Seeder;

class AccessoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Accessory::class, 20)->create();
    }
}

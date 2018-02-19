<?php

use App\Characteristic;
use Illuminate\Database\Seeder;

class CharacteristicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Characteristic::class, 100)->create();
    }
}

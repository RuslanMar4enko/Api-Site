<?php

use Illuminate\Database\Seeder;
use App\AdditionalCharacteristic;

class AdditionalCharacteristicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AdditionalCharacteristic::class, 100)->create();
    }
}

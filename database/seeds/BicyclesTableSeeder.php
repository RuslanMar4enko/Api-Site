<?php

use App\Bicycle;
use Illuminate\Database\Seeder;

class BicyclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bicycle::class, 20)->create();
    }
}

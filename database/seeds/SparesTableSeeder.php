<?php

use App\Spare;
use Illuminate\Database\Seeder;

class SparesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Spare::class, 20)->create();
    }
}

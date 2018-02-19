<?php

use App\Fastening;
use Illuminate\Database\Seeder;

class FasteningsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Fastening::class, 20)->create();
    }
}

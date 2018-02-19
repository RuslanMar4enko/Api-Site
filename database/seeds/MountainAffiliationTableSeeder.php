<?php

use App\MountainAffiliation;
use Illuminate\Database\Seeder;

class MountainAffiliationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MountainAffiliation::class, 20)->create();
    }
}

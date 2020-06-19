<?php

use App\Garden;
use Illuminate\Database\Seeder;

class GardenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Garden::class, 1)->create();
    }
}

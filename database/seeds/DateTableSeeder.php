<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 7) as $index) {
            DB::table('date_graphics')->insert([
                'data' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'id_dnia_grafik'=>$index
            ]);
        }
    }
}

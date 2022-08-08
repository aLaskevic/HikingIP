<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BingoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bingos = [
            ['image' => 'bingos/bs_sommer.png', 'season' => 'sommer', 'map_id' => 1],
            ['image' => 'bingos/bs_winter.png', 'season' => 'winter', 'map_id' => 1],
            ['image' => 'bingos/bs_herbst.png', 'season' => 'herbst', 'map_id' => 1],
            ['image' => 'bingos/bs_fruehling.png', 'season' => 'frühling', 'map_id' => 1],
        ];
        DB::table('bingos')->insert($bingos);

    }
}

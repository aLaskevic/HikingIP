<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = [
            ['name' => 'Spielplatz', 'image' => 'stations/spielplatz.png', 'map_id' => 1],
            ['name' => 'Strand', 'image' => 'stations/strand.png', 'map_id' => 1],
            ['name' => 'Brücke', 'image' => 'stations/bruecke.png', 'map_id' => 1],
            ['name' => 'Stein', 'image' => 'stations/stein.png', 'map_id' => 1],
            ['name' => 'Kreuz', 'image' => 'stations/kreuz.png', 'map_id' => 1],
        ];
        DB::table('stations')->insert($stations);
    }
}

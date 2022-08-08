<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MapSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maps')->insert([
            'user_id'   => 1,
            'routename' => 'Blausteinsee',
            'location' => 'Aachen',
            'gmap' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10075.064519289679!2d6.2659799926311885!3d50.85401492252776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bf5fdccc2d6d5d%3A0xc9fef0890a1a36de!2sBlausteinsee!5e0!3m2!1sde!2sde!4v1656418893691!5m2!1sde!2sde',
            'description' => 'Am Blausteinsee (Eschweiler, bei Aachen) wurde neben dem WasserWeg Omerbach/Inde ein zweiter WasserWeg mit der Ortsgruppe Eschweiler mit den NaturFreunden NRW entwickelt. An diesem ehemaligen Tagebaurestloch ist in den letzten Jahrzehnten ein See entstanden, der als Naherholungsgebiet und Freizeit sowie Badesee bekannt ist.',
            'image' => 'maps/blausteinsee.png',
            'length' => 5.1,
            'public' => 1,
        ]);
    }
}
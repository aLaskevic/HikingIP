<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class QuestionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
        #1
        ['question' => 'Wie tief ist der Blausteinsee?', 'image' => null, 'station_id' => 3],
        #2
        ['question' => 'Welche Frucht ist das?', 'image' => 'questions/brombeere.png', 'station_id' => 3],
        #3
        ['question' => 'Zu welchem Baum gehört diese Blatt?', 'image' => 'questions/eiche.png', 'station_id' => 3],
        #4
        ['question' => 'Welcher dieser Pilze ist giftig?', 'image' => null,'station_id' => 3],
        #5
        ['question' => 'Was machen Ameisen im Winter?', 'image' => null,'station_id' => 3],
        #6
        ['question' => 'Wie viele Stacheln hat ein Igel ungefähr?', 'image' => null,'station_id' => 3],
        #7
        ['question' => 'Welcher Baum hat so einen Stamm?', 'image' => 'questions/birke.png','station_id' => 3],
        #8
        ['question' => 'Warum ist der Blausteinsee so besonders?', 'image' => null,'station_id' => 3],
        #9
        ['question' => 'Was war vorher an der Stelle, wo jetzt der Blausteinsee liegt?', 'image' => null ,'station_id' => 5],
        #10
        ['question' => 'Welche Blume wird zur Pusteblume?', 'image' => null,'station_id' => 5],
        #11
        ['question' => 'Welcher ist der größte See Deutschlands?', 'image' => null,'station_id' => 5],
        #12
        ['question' => 'Welchen Baum stellt man an Weihnachten ins Haus?', 'image' => null,'station_id' => 5],
        #13
        ['question' => 'Was ist das für ein Tier?', 'image' => 'questions/frosch.png','station_id' => 5],
        #14
        ['question' => 'Wie alt kann eine Ente werden?', 'image' => null,'station_id' => 5],
        #15
        ['question' => 'Was ist das für eine Vogelart?', 'image' => 'questions/specht.png','station_id' => 5],
        #16
        ['question' => 'Welcher Fisch lebt nicht in deutschen Gewässern?', 'image' => null,'station_id' => 5],
        #17
        ['question' => 'Welche Temperatur hat das Wasser im Blausteinsee im Winter?', 'image' => null,'station_id' => 5],
    ];
    DB::table('questions')->insert($questions);
    }
}
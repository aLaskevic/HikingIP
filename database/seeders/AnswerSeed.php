<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AnswerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = [
            #Wie tief ist der Blausteinsee?
            ['answer' => '46 Meter', 'status' => true, 'question_id' => 1],
            ['answer' => '60 Meter', 'status' => false, 'question_id' => 1],
            ['answer' => '100 Meter', 'status' => false, 'question_id' => 1],
            #Welche Frucht ist das?
            ['answer' => 'Brombeere', 'status' => true, 'question_id' => 2],
            ['answer' => 'Himbeere', 'status' => false, 'question_id' => 2],
            ['answer' => 'Erdbeere', 'status' => false, 'question_id' => 2],
            #Zu welchem Baum gehört dieses Blatt?
            ['answer' => 'Eiche', 'status' => true, 'question_id' => 3],
            ['answer' => 'Birke', 'status' => false, 'question_id' => 3],
            ['answer' => 'Tanne', 'status' => false, 'question_id' => 3],
            #Welcher dieser Pilze ist giftig?
            ['answer' => 'Fliegenpilz', 'status' => true, 'question_id' => 4],
            ['answer' => 'Steinpilz', 'status' => false, 'question_id' => 4],
            ['answer' => 'Champignon', 'status' => false, 'question_id' => 4],
            #Was machen Ameisen im Winter?
            ['answer' => 'Sie leben genauso weiter wie im Sommer', 'status' => false, 'question_id' => 5],
            ['answer' => 'Sie wandern nach Süden', 'status' => false, 'question_id' => 5],
            ['answer' => 'Sie fallen in eine Kältestarre und tauen im Sommer wieder auf', 'status' => true, 'question_id' => 5],
            #Wie viele Stacheln hat ungefähr ein Igel?
            ['answer' => '100', 'status' => false, 'question_id' => 6],
            ['answer' => '500', 'status' => false, 'question_id' => 6],
            ['answer' => '5.000', 'status' => true, 'question_id' => 6],
            #Welcher Baum hat so einen Stamm?
            ['answer' => 'Birke', 'status' => true, 'question_id' => 7],
            ['answer' => 'Fichte', 'status' => false, 'question_id' => 7],
            ['answer' => 'Tanne', 'status' => false, 'question_id' => 7],
            #Warum ist der Blausteinsee so besonders?
            ['answer' => 'Er ist der größte in Deutschland', 'status' => false, 'question_id' => 8],
            ['answer' => 'Er wurde künstlich angelegt', 'status' => true, 'question_id' => 8],
            ['answer' => 'Er ist der einzige deutsche See in dem man Barsche findet', 'status' => false, 'question_id' => 8],
            #Was war vorher an der Stelle vom Blausteinsee?
            ['answer' => 'Braunkohletagabbau', 'status' => true, 'question_id' => 9],
            ['answer' => 'Nichts', 'status' => false, 'question_id' => 9],
            ['answer' => 'Die stadt Blaustein', 'status' => false, 'question_id' => 9],
            #Welche Blume wird zur Pusteblume
            ['answer' => 'Löwenzahn', 'status' => true, 'question_id' => 10],
            ['answer' => 'Sonnenblume', 'status' => false, 'question_id' => 10],
            ['answer' => 'Tulpe', 'status' => false, 'question_id' => 10],
            #Welcher ist der größte See Deutschlands?
            ['answer' => 'Blausteinsee', 'status' => false, 'question_id' => 11],
            ['answer' => 'Chiemsee', 'status' => false, 'question_id' => 11],
            ['answer' => 'Bodensee', 'status' => true, 'question_id' => 11],
            #Welchen Baum stellt man an Weihnachten ins Haus?
            ['answer' => 'Tanne', 'status' => true, 'question_id' => 12],
            ['answer' => 'Fichte', 'status' => false, 'question_id' => 12],
            ['answer' => 'Kiefer', 'status' => false, 'question_id' => 12],
            #Was ist das für ein Tier?
            ['answer' => 'Frosch', 'status' => true, 'question_id' => 13],
            ['answer' => 'Fisch', 'status' => false, 'question_id' => 13],
            ['answer' => 'Qualle', 'status' => false, 'question_id' => 13],
            #Wie alt kann eine Ente werden?
            ['answer' => '5', 'status' => false, 'question_id' => 14],
            ['answer' => '20', 'status' => true, 'question_id' => 14],
            ['answer' => '30', 'status' => false, 'question_id' => 14],
            #Was ist das für eine Vogelart?
            ['answer' => 'Specht', 'status' => true, 'question_id' => 15],
            ['answer' => 'Habicht', 'status' => false, 'question_id' => 15],
            ['answer' => 'Amsel', 'status' => false, 'question_id' => 15],
            #Welcher Fisch lebt nicht in deutschen Gewässern?
            ['answer' => 'Thunfisch', 'status' => true, 'question_id' => 16],
            ['answer' => 'Forelle', 'status' => false, 'question_id' => 16],
            ['answer' => 'Hecht', 'status' => false, 'question_id' => 16],
            #Welche Temperatur hat das Wasser im Blausteinsee im Winter?
            ['answer' => '-8 °C', 'status' => false, 'question_id' => 17],
            ['answer' => '-4 °C', 'status' => false, 'question_id' => 17],
            ['answer' => '4 °C', 'status' => true, 'question_id' => 17],
        ];

        DB::table('answers')->insert($answers);
    }
}

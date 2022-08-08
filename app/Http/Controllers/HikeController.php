<?php

namespace App\Http\Controllers;

use App\Models\Bingo;
use App\Models\User;
use App\Models\Map;
use App\Models\Station;
use App\Models\Question;
use Illuminate\Http\Request;
use PDF;

#Der HikeController verwaltet alle Funktionen die für die Wanderung selbst
class HikeController extends Controller
{
    public function nextstation(Map $map, $currstation){
        $station = Station::find($currstation);
        $nextstation = Station::where('id', '>', $currstation)->first();
        $ids = $map->stations()->where('id','>','0')->pluck('id')->toArray();
        $maps = Map::limit(4)->get();

        if($station == null){
            $station = Station::orderBy('id','desc')->first();
            if(auth()->check()){
            $check = auth()->user()->hiking()->where('id','=',$map->id)->get()->toArray();
            if($check == null)
                auth()->user()->hiking()->attach($map);
            }
            return view('map.hike.end', compact('map','station','maps'));
        }


        #Falls Station nicht zur Map gehört -> Ende erreicht
        if(!in_array($station->id, $ids)){
            $maps = Map::limit(4)->get();
            if(auth()->check()){
            $check = auth()->user()->hiking()->where('id','=',$map->id)->get()->toArray();
            if($check == null)
                auth()->user()->hiking()->attach($map);
            }
            return view('map.hike.end', compact('map','maps','station'));
        }
        $firstquestion = $station->questions()->first();
        return view('map.hike.start', compact('map', 'station','nextstation','firstquestion'));

    }

    public function result(Map $map, $currstation, Question $question, Request $request){
        $result = '';
        $station = Station::where('id','=', $currstation)->first();
        $answer = $question->answers()->where('status','=',true)->first();
        $result = $question->answers()->where('answer', '=', $request['answer'])->first();
        return view('map.hike.result', compact('map','station','question','result','answer'));
    }

    public function nextquestion(Map $map, $currstation, Question $question){
        $station = $map->stations()->where('id', '=', $currstation)->first();
        $nextquestion = $station->questions()->where('id', '>', $question->id)->first();
        $question = $nextquestion;
        $nextstation = $map->stations()->where('id', '>', $station->id)->first();

        if($question == null){

            if($nextstation == null)
                return redirect('maps/'.$map->id.'/'.$station->id + 1);

            return redirect('maps/'.$map->id.'/'.$nextstation->id);
        }

        return view('map.hike.question', compact('question','map','station'));
    }

    public function startquestion(Map $map,$currstation,Question $question){
        $station = Station::where('id','=', $currstation)->first();

        return view('map.hike.question', compact('map', 'station','question'));
    }

    public function hike()
    {
        return view('map.hiketest');
    }

    public function offline(Map $map, Question $question, Bingo $bingo ){
      $pdf = PDF::loadView('map.hike.offline', compact('map', 'question', 'bingo'));
      return $pdf->download('offline.pdf');
    }

    #Probe Funktion
    public function store(){
        $category = Map::find(1);
        dd(auth()->user()->hiking()->attach($category));
        return redirect('/admin/route');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Map;
use App\Models\Question;
use App\Models\Station;
use App\Models\Answer;



class AnswerController extends Controller
{

    public function store(Map $map,Station $station, Question $question, Request $request){
        $data = request()->validate([
            'answer' => 'required',
        ]);

        $checkbox = $request->status ?? 0 ?? 1;  
        
       $question->answers()->create([
        'answer'    => $data['answer'],
        'status'    => $checkbox
       ]);

        return redirect('/admin/map/'.$map->id.'/station/'.$station->id.'/quiz/'.$question->id);
    }

    public function show(Map $map,Station $station, Question $question, Answer $answer){
        return view('admin.map.station.quiz.answer.show', compact('map','station','question','answer'));
    }

    public function create(Map $map,Station $station, Question $question){
        return view('admin.map.station.quiz.answer.create', compact('map','station','question'));
    }

    public function edit(Map $map, Station $station, Question $question, Answer $answer){
        return view('admin.map.station.quiz.answer.edit', compact('map', 'station', 'question','answer'));
    }
    
    public function update(Map $map,Station $station, Question $question, Answer $answer){
        $data = request()->validate([
            'answer'        => 'required',
            'status'        => ''
        ]);
        
        $answer->update($data);

        return redirect('admin/map/'.$map->id.'/station/'.$station->id.'/quiz/'.$question->id.'/');
    }

    public function remove(Map $map, Station $station, Question $question, Answer $answer){
        return view('admin.map.station.quiz.answer.delete', compact('map','station','question','answer'));
    }

    public function delete(Map $map,Station $station, Question $question, Answer $answer){
        $answer->delete();;
        return redirect('admin/map/'.$map->id.'/station/'.$station->id.'/quiz/'.$question->id);
    }
}

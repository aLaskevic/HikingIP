<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Map;
use App\Models\Station;
use App\Models\Question;
use Intervention\Image\Facades\Image;


class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function create(Map $map){
        return view('admin.map.station.quiz.create', compact('map'));
    }

    public function store(Map $map, Station $station){
        $data = request()->validate([
            'question' => 'required',
            'image'     => 'image'
        ]);

        $imagePath = null;
        if(request('image') != null)
        {
            $imagePath = request('image')->store('questions', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 600);
            $image->save();
        }
        $station->questions()->create([
            'question'     =>  $data['question'],
            'image'    =>  $imagePath,
        ]);

        return redirect('/admin/map/'.$map->id.'/station/'.$station->id);
    }

    public function show(Map $map,Station $station, Question $question){
        return view('admin.map.station.quiz.edit.index', compact('map','station','question'));
    }

    public function editquestion(Map $map,Station $station, Question $question){
        return view('admin.map.station.quiz.edit.question', compact('map','station', 'question'));
    }
    
    
    public function updatequestion(Map $map, Station $station, Question $question){
        $data = request()->validate([
            'question'      => 'required',
        ]);
        
        $station->questions()->update($data);

        return redirect('admin/map/'.$map->id.'/station/'.$station->id.'/quiz/'.$question->id);
    }

    public function editImage(Map $map,Station $station, Question $question){
        return view('admin.map.station.quiz.edit.image', compact('map','station', 'question'));
    }

    public function updateimage(Map $map, Station $station, Question $question){
        $data = request()->validate([
            'image' => 'image|required'
        ]);

        Storage::delete('public/'.$question->image);

        $imagePath = request('image')->store('questions', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 600);
        $image->save();

        $question->update([
            'image' => $imagePath
        ]);

        return redirect('admin/map/'.$map->id.'/station/'.$station->id.'/quiz/'.$question->id);
    }

    public function remove(Map $map,Station $station, Question $question){
        return view('admin.map.station.quiz.delete', compact('map','station','question'));
    }

    public function delete(Map $map,Station $station ,Question $question){
        $question->delete();
        return redirect('admin/map/'.$map->id.'/station/'.$station->id);
    }
}

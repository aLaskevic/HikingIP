<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Map;
use App\Models\Station;
use App\Models\Tale;

class TaleController extends Controller
{
    public function index(Map $map, Station $station){
        return view('admin.map.station.tales.index', compact('map','station'));
    }

    public function create(Map $map, Station $station){
        return view('admin.map.station.tales.create', compact('map', 'station'));
    }

    public function store(Map $map, Station $station){
        $data = request()->validate([
            'title'     => 'required',
            'text'      => 'required',
        ]);

        $station->tale()->create($data);

        return redirect('admin/map/'.$map->id.'/station/'.$station->id);
    }

    public function show(Map $map,Station $station){
        return view('admin.map.station.tales.edit.index', compact('station', 'map'));
    }

    public function edittitle(Map $map,Station $station){
        return view('admin.map.station.tales.edit.title', compact('map','station'));
    }
    public function updatetitle(Map $map, Station $station){
        $data = request()->validate([
            'title'      => 'required',
        ]);
        
        $station->tale->update($data);

        return redirect('admin/map/'.$map->id.'/station/'.$station->id);
    }
    public function edittext(Map $map, Station $station){
        return view('admin.map.station.tales.edit.text', compact('map', 'station'));
    }
    public function updatetext(Map $map, Station $station){
        $data = request()->validate([
            'text'      => 'required',
        ]);
        
        $station->tale->update($data);

        return redirect('admin/map/'.$map->id.'/station/'.$station->id);
    }

    public function remove(Map $map,Station $station){
        return view('admin.map.station.tales.edit.delete', compact('station','map'));
    }

    public function delete(Map $map,Station $station){
        $station->tale->delete();
        return redirect('/admin/map/'.$map->id.'/station/'.$station->id);
    }
}
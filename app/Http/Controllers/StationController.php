<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Map;
use App\Models\Station;

class StationController extends Controller
{
    public function index(Map $map){
        return view('admin.map.station.index', compact('map'));
    }

    public function create(Map $map){
        return view('admin.map.station.create', compact('map'));
    }

    public function store(Map $map){
        $data = request()->validate([
            'name'  =>  'required',
            'image' =>  'image|required'
        ]);
        
        $imagePath = request('image')->store('stations', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 600);
        $image->save();
        
        $map->stations()->create([
            'name'     =>  $data['name'],
            'image'    =>  $imagePath,
        ]);

        return redirect('/admin/map/'.$map->id.'/station');
    }

    public function editname(Map $map, Station $station){
        return view('admin.map.station.edit.name', compact('map','station'));
    }

    public function updatename(Map $map, Station $station){
        $data = request()->validate([
            'name' => 'required'
        ]);

        $station->update($data);

        return redirect('admin/map/'.$map->id.'/station/'.$station->id);
    }


    public function editimage(Map $map, Station $station){
        return view('admin.map.station.edit.image', compact('map','station'));
    }

    public function updateimage(Map $map, Station $station){
        $data = request()->validate([
            'image' => 'image|required'
        ]);

        Storage::delete('public/'.$station->image);

        $imagePath = request('image')->store('stations', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 600);
        $image->save();

        $station->update([
            'image' => $imagePath
        ]);

        return redirect('admin/map/'.$map->id.'/station/'.$station->id);
    }

    public function show(Map $map, Station $station){
        return view('admin.map.station.view', compact('map','station'));
    }

    public function delete(Map $map, Station $station){
        return view('admin.map.station.delete', compact('map','station'));
    }
    
    public function remove(Map $map, Station $station){
        Storage::delete('public/'.$station->image);
        $station->delete();

        if($map->stations()->count() <= 0){
            $map->update(['public' => false]);
        }
    

        return redirect('admin/map/'.$map->id.'/station');
    }
}

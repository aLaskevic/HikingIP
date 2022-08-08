<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Map;
use App\Models\Bingo;

class AdminBingoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(Map $map){
        return view('admin.map.bingo.index', compact('map'));
    }

    public function create(Map $map){
        return view('admin.map.bingo.create', compact('map'));
    }

    public function store(Map $map){
        $data = request()->validate([
            'image'     => 'image|required',
            'season'      => 'required',
        ]);
        
        $imagePath = request('image')->store('bingos', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 600);
        $image->save();

        $map->bingos()->create([
            'image'         =>  $imagePath,
            'season'        =>  $data['season'],
        ]);
        return redirect('/admin/map/'.$map->id.'/bingo');
    }

    public function view(Map $map, Bingo $bingo){
        return view('admin.map.bingo.view', compact('map','bingo'));
    }

    public function remove(Map $map, Bingo $bingo){
        return view('admin.map.bingo.delete', compact('map', 'bingo'));
    }

    public function delete(Map $map, Bingo $bingo){
        Storage::delete('public/'.$bingo->image);
        $bingo->delete();
        return redirect('/admin/map/'.$map->id.'/bingo');
    }

    public function edit(Map $map, Bingo $bingo){
        return view('admin.map.bingo.edit.image', compact('map', 'bingo'));
    }
    
    public function update(Map $map, Bingo $bingo){
        $data = request()->validate([
            'image'     =>      'required',
            'season'    =>      'required'
        ]);
        
        $bingo->update($data);

        return redirect('/admin/map/'.$map->id.'/bingo/'. $bingo->id);
    }
}

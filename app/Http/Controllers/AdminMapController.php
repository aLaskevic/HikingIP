<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Map;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function create()
    {
        return view('admin.map.create');
    }
    public function orderbyname()
    {
        $maps = Map::orderby("routename", 'Asc')->get();
        return view('admin.map.index', [
            'map' => $maps
        ]);
    }

    public function orderbylocation()
    {
        $maps = Map::orderBy("location", 'Asc')->get();
        return view('admin.map.index', [
            'map' => $maps
        ]);
    }

    public function orderbycreator()
    {
        $maps = Map::orderBy("user_id", 'Asc')->get();
        return view('admin.map.index', [
            'map' => $maps
        ]);
    }

    public function edit(Map $map){
        return view('admin.map.edit.index', compact('map'));
    }
    
    public function editname(Map $map){
        return view('admin.map.edit.name', compact('map'));
    }

    public function updatename(Map $map){
        $data = request()->validate([
            'routename'      => 'required',
        ]);
        
        $map->update($data);

        return view('admin.map.edit.index', [
            'map' => $map
        ]);
    }

    public function editlocation(Map $map){
        return view('admin.map.edit.location', compact('map'));
    }

    public function updatelocation(Map $map){
        $data = request()->validate([
            'location'      => 'required',
        ]);
        
        $map->update($data);

        return view('admin.map.edit.index', [
            'map' => $map
        ]);
    }


    public function editlength(Map $map){
        return view('admin.map.edit.length', compact('map'));
    }

    public function updatelength(Map $map){
        $data = request()->validate([
            'length'      => 'required',
        ]);
        
        $map->update($data);

        return view('admin.map.edit.index', [
            'map' => $map
        ]);
    }

    
    public function editdescription(Map $map){
        return view('admin.map.edit.description', compact('map'));
    }

    public function updatedescription(Map $map){
        $data = request()->validate([
            'description'      => 'required',
        ]);
        
        $map->update($data);

        return view('admin.map.edit.index', [
            'map' => $map
        ]);
    }

        
    public function editgmap(Map $map){
        return view('admin.map.edit.gmap', compact('map'));
    }

    public function updategmap(Map $map){
        $data = request()->validate([
            'gmap'      => 'required',
        ]);
        
        $map->update($data);

        return view('admin.map.edit.index', [
            'map' => $map
        ]);
    }

    
    public function editimage(Map $map){
        return view('admin.map.edit.image', compact('map'));
    }

    public function updateimage(Map $map){
        $data = request()->validate([
            'image'      => 'required|image',
        ]);

        Storage::delete('public/'.$map->image);

        $imagePath = request('image')->store('maps', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 600);
        $image->save();

        
        $map->update(array_merge(
            $data,
            ['image' => $imagePath]
        ));

        return view('admin.map.edit.index', [
            'map' => $map
        ]);
    }

    public function deletemap(Map $map){
        return view('admin.map.edit.delete', compact('map'));
    }

    public function removemap(Map $map){
        Storage::delete('public/'.$map->image);
        foreach($map->stations()->get() as $station){
            Storage::delete('public/'.$station->image);
        }
        $map->delete();
        return redirect('/admin/map');
    }

    public function list(){
        $map = Map::all();

        return view('admin.map.index', compact('map'));
    }

    public function show(Map $map){
        return view('admin.map.edit.index', compact('map'));
    }

    public function store()
    {
        $data = request()->validate([
            'routename'     => 'required|unique:maps',
            'location'      => 'required',
            'length'        => 'required|integer',
            'gmap'           => 'required',
            'description'   => 'required',
            'image'         => 'required|image',
        ]);

        $imagePath = request('image')->store('maps', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 600);
        $image->save();


        $map = auth()->user()->maps()->create([
            'routename'     =>  $data['routename'],
            'location'      =>  $data['location'],
            'gmap'          =>  $data['gmap'],
            'length'        =>  $data['length'],
            'description'   =>  $data['description'],
            'image'         =>  $imagePath,
        ]);
        return redirect('/admin/map/'.$map->id);
    }

    public function publish(Map $map){
        if($map->stations()->count() >= 1)
        {
         $map->update([
            'public' => true
            ]);
        }

        return redirect('/admin/map/'.$map->id);
    }
    public function hide(Map $map){
        $map->update([
            'public' => false
        ]);

        return redirect('/admin/map/'.$map->id);
    }
}

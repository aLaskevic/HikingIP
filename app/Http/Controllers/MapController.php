<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Map;
use App\Models\User;

class MapController extends Controller
{
    public function index()
    {
        $map = Map::where('public', '=', true)->get();
        
        return view('map.index', compact('map'));
        
    }

    public function show(Map $map)
    {
        $start = $map->stations()->first();
        return view('map.show', compact('map','start'));
    }

    public function search(Request $request){
        $search = $request->input('search');
        $map = Map::query()->where('routename', 'LIKE', "%{$search}%")->orWhere('location', 'LIKE', "%{$search}%")->get();
        return view('map.index', compact('map'));
    }
}

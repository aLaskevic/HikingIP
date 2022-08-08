<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BingoController extends Controller
{
    public function index(Map $map){
        return view('admin.map.edit.bingo.index', [
            'map' => $map
        ]);
    }
}

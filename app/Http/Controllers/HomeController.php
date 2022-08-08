<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Map;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function landing(){
        $maps = Map::limit(2)->get();

        return view('welcome', compact('maps'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Map;

class ProfileController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }
   public function index()
   {
        $maps = auth()->user()->hiking();
        $lastmaps = $maps->limit(2)->get();
        $length = $maps->sum('length');
        $mapcount = $maps->count();
        #recommendedmaps muss noch erstellt werden
        $recommendedmaps = Map::limit(3)->get();
        return view('profile.index', compact('maps','lastmaps','length', 'mapcount','recommendedmaps'));
   }
   public function edit()
   {
       return view('profile.edit.index');
   }
   public function editpassword()
   {
       return view('profile.edit.password');
   }

   public function updatepassword(Request $request)
   {
    $data = request()->validate([
        'oldpassword'     => 'required',
        'newpassword'     => 'required|confirmed',
    ]);

        if(Hash::check($request->oldpassword, auth()->user()->password)){  
            auth()->user()->update(['password' => Hash::make($request->newpassword)]);
        }

        return redirect('/profile');
   }
}
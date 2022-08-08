<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $guarded = [];



    protected $fillable = [
        'routename',
        'location',
        'gmap',
        'description',
        'length',
        'image',
        'public',
    ];

    protected $hidden = [
        'public',
    ];

    #Prüfe ob der Nutzer $user eine Karte bereits gelaufen ist.
    public function check($user)
    {
        $check = $this->hikers()->where('id', '=' , $user->id)->first();
        return $check == null ? false : $check;
    }
    public function hikers()
    {
        return $this->belongstoMany(User::class)->withTimestamps();;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function stations(){
        return $this->HasMany(Station::class);
    }
    public function bingos(){
        return $this->HasMany(Bingo::class);
    }
}

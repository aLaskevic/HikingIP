<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bingo extends Model
{
    use HasFactory;

    public function Map(){
        return $this->belongsTo(Map::class);
    }

    protected $fillable = [
        'image',
        'season'
    ];
}

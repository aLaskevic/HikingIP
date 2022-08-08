<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    
    protected $guarded = [];



    protected $fillable = [
        'name',
        'image'
    ];#


    #public function bingos(){
    #    return $this->HasMany(Bingo::class);
    #}

    public function tale(){
        return $this->HasOne(Tale::class);
    }

    public function questions(){
        return $this->HasMany(Question::class);
    }
}

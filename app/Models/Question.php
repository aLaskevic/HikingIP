<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'question',
        'image'
    ];

    public function station(){
        return $this->belongsTo(Station::class);
    }

    public function answers(){
        return $this->HasMany(Answer::class);
    }
}

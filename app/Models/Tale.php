<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tale extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'title',
        'text'
    ];

    public function map(){
        return $this->belongsTo(Station::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function artists(){
        return $this->hasMany(Artist::class);
    }

    protected $fillable = [
        'max_capacity',
        'is_outdoors',
        'address',
        'datetime',
        'country',
        'latitude',
        'longitude',
        'city',
        'price',
        'discount', // If needed
    ];
    
}

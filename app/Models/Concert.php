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
        return $this->belongsToMany(Artist::class);
    }

    protected $hidden = ['created_at', 'updated_at'];

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
        'discount',
    ];
    
}

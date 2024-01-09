<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    public function concerts(){
        return $this->belongsToMany(Concert::class);
    }
}

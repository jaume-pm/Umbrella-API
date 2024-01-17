<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'name'; // Set the 'name' column as the primary key
    public $incrementing = false;
    
    protected $hidden = ['created_at', 'updated_at'];
    
    protected $fillable = ['name', 'country', 'bio'];

    public function concerts()
    {
        return $this->belongsToMany(Concert::class);
    }
}

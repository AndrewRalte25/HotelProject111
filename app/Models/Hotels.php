<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'Location',
        'Opening',
        'ContactInfo',
        'Image' , 
    ];

    protected $hidden = [
        // 'is_active',
        // 'limit'
    ];

    protected $casts = [
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
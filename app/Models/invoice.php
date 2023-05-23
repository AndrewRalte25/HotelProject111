<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'hotelname',
        'email',
        'price',
        'rzp_id' , 
        'roomnumber',
       
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

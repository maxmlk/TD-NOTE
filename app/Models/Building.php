<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'name',
        'capacity',
    ];
    use HasFactory;

    public function reservations()
    {
    return $this->hasMany(Reservation::class);
    }
}

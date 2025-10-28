<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cars() 
    {
        return $this->hasMany(Car::class); // Связь один к многим
    }

    public function country() 
    {
        return $this->belongsTo(Country::class); // Связь один к одному (ну точнее у страны много можеть быть машин поэтому)
    }
}

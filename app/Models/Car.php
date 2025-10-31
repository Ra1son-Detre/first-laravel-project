<?php

namespace App\Models;

use App\Enum\Cars\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts =[
        'status' => Status::class
    ];

    protected $fillable = ['brand_id', 'model', 'price', 'transmission', 'vin', 'status'];

    public function brand () 
    {
        return $this->belongsTo(Brand::class); //каждая машина связана с брендом 
    }

    public function tags () 
    {
        return $this->belongsToMany(Tag::class)->withTimestamps(); // 
    }

    public function getCanDeleteAttribute() // Правило: машину можно удалить только если её статус "NOT_SET" (не назначена/не продана и т.д.)
    {
        return $this->status === Status::NOT_SET;
    }

    public function scopeOfActive($query)//Базовый запрос, на уровне модели, что-бы контроллеру было проще обращаться и что-бы было меньше кода в контроллере (сложных запросов)
    {
        return $query->where('status', Status::ACTIVE);
    }

    public function scopeOfAll($query)//Запрос на все 
    {
        return $query->with('brand.country', 'tags')->orderByDesc('created_at')->get();
        
    }
}

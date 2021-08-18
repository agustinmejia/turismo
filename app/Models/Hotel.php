<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Hotel extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'hotels_type_id', 'hotels_category_id', 'hotels_group_id', 'city_id', 'user_id', 'name', 'slug', 'address', 'phone', 'fax', 'email', 'location', 'status'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function type(){
        return $this->belongsTo(HotelsType::class, 'hotels_type_id');
    }

    public function category(){
        return $this->belongsTo(HotelsCategory::class, 'hotels_category_id');
    }

    public function group(){
        return $this->belongsTo(HotelsGroup::class, 'hotels_group_id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }
}

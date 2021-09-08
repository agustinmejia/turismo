<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Cviebrock\EloquentSluggable\Sluggable;

class Country extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'slug'];

    public function states(){
        return $this->hasMany(State::class);
    }

    public function detail(){
        return $this->hasMany(HotelsDetail::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}

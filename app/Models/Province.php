<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Cviebrock\EloquentSluggable\Sluggable;

class Province extends Model
{
    use HasFactory, Sluggable, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['state_id', 'name', 'slug'];

    public function cities(){
        return $this->hasMany(City::class);
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id');
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

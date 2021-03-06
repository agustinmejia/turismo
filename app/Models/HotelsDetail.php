<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelsDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'hotel_id', 'country_id', 'full_name', 'ci', 'room_number', 'age', 'gender', 'marital_status', 'job', 'start', 'finish', 'reason'
    ];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function nacionality(){
        return $this->hasOne(HotelsDetailsNacionality::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelsDetailsNacionality extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotels_detail_id', 'state_id', 'province_id', 'city_id', 'origin'
    ];
}

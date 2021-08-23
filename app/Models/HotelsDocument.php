<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelsDocument extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'hotel_id', 'hotels_documents_type_id', 'code', 'start', 'expiration', 'file', 'observations'
    ];

    public function type(){
        return $this->belongsTo(HotelsDocumentsType::class, 'hotels_documents_type_id');
    }
}

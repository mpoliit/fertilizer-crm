<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fertilizer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public function crop(){
        return $this->belongsTo(Crop::class, 'crop_id', 'id');
    }
}

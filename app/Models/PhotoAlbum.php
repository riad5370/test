<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoAlbum extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function PhotoYear(){
        return $this->belongsTo(PhotoYear::class,'year_id');
    }
}

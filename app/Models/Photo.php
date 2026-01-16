<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Album;

class Photo extends Model
{
    protected $fillable = ['album_id', 'image'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}

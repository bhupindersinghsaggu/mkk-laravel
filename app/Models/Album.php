<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Photo;

class Album extends Model
{
    protected $fillable = ['title', 'description'];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}

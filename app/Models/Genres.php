<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $table = 'genres'; 


    protected $fillable = ['name'];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }


    public function customMethod()
    {

    }
}

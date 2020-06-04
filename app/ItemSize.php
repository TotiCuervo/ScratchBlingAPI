<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemSize extends Model
{
    protected $fillable = ['size'];

    public function BackScratchers() {
        $this->hasMany(BackScratcher::class);
    }
}

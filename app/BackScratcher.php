<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

class BackScratcher extends Model
{
    protected $fillable = ['item_name', 'item_description', 'item_size', 'item_cost'];

//    protected $with = ['itemSize'];

    public function scopeItemCost(Builder $query, $cost): Builder
    {
        return $query->where('item_cost', '<=', $cost);
    }

    public function itemSize() {
        return $this->hasOne(ItemSize::class, 'size', 'item_size');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Spatie\QueryBuilder\QueryBuilder;

class BackScratcher extends Model
{
    protected $fillable = ['item_name', 'item_description', 'item_cost', 'item_size'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = ['item_size' => 'array'];

    public function scopeItemCost(Builder $query, $cost): Builder
    {
        return $query->where('item_cost', '<=', $cost);
    }

}

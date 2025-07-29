<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'price',
        'menu_category_id'
    ];

    public function menu_category()
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menus_has_orders', 'order_id', 'menu_id');
    }
}

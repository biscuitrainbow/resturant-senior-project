<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeOption extends Model
{
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}

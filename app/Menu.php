<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function sizeOptions()
    {
        return $this->hasMany(SizeOption::class, 'menu_id');
    }

    public function otherOptions()
    {
        return $this->hasMany(OtherOption::class, 'menu_id');
    }
}

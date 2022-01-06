<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'name','p_id', 'alias', 'active'
    ];

    public function children()
{
    return $this->hasMany(Category::class, 'p_id')->with('children');
}
}

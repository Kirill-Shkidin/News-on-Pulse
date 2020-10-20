<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['title', 'slug'];

    public function news() {
      return $this->hasMany(News::class, 'category');
    }
}

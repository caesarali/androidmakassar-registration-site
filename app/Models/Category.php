<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'name', 'description'];

    public function events() {
        return $this->hasMany(Event::class);
    }
}

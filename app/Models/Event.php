<?php

namespace App\Models;

use App\Traits\Code;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes, Code;

    protected $fillable = ['code', 'name', 'description', 'city_id', 'category_id', 'status'];

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function registrations() {
        return $this->hasMany(Registration::class);
    }
}

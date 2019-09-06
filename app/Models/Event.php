<?php

namespace App\Models;

use App\Traits\Code;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes, Code;

    protected $fillable = ['code', 'name', 'description', 'price', 'city_id', 'category_id', 'status'];
    protected $appends = ['have_promo'];

    public function getPriceAttribute($value) {
        return $value - $this->discount();
    }

    public function getHavePromoAttribute() {
        return $this->attributes['have_promo'] = $this->promo ? true : false;
    }

    public function discount() {
        $discountInPercent = $this->promo ? $this->promo->discount : '0';
        return ($this->getOriginal('price') * $discountInPercent) / 100;
    }

    public function promo() {
        return $this->hasOne(Promo::class)
                    ->whereDate('from_date', '<=', now()->format('Y-m-d'))
                    ->whereDate('to_date', '>=', now()->format('Y-m-d'));
    }

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

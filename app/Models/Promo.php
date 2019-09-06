<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promo extends Model
{
    use SoftDeletes;

    protected $table = 'promo';
    protected $fillable = ['name', 'event_id', 'discount', 'type', 'from_date', 'to_date'];
    protected $dates = ['from_date', 'to_date'];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}

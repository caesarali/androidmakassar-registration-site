<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promo extends Model
{
    use SoftDeletes;

    protected $table = 'promo';
    protected $fillable = ['code', 'name', 'description', 'event_id', 'discount', 'type', 'from_date', 'to_date'];
    protected $dates = ['from_date', 'to_date'];
    protected $appends = ['is_valid', 'status'];

    public function getIsValidAttribute() {
        return $this->attributes['to_date'] >= now();
    }

    public function getStatusAttribute() {
        $status = 0;
        if ($this->attributes['from_date'] <= now()) {
            $status = 1;
        }
        if ($this->attributes['to_date'] < now()) {
            $status = 2;
        }
        return $status;
    }

    public function event() {
        return $this->belongsTo(Event::class);
    }
}

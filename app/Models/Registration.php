<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'event_id', 'schedule_id', 'participant_id', 'paybill', 'status'];

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function participant() {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    public function receipt() {
        return $this->hasOne(Receipt::class, 'code', 'code');
    }

    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }

    public static function boot() {
        parent::boot();
        static::created(function ($model) {
            $id = $model->id;
            $event = $model->event;
            $prefix = $event->category->code . $event->code;
            $length = 3 - strlen($id);
            $code = '';
            for ($i=0; $i < $length ; $i++) {
                $code = $code . '0';
            }
            $model->code = $prefix . $code . $id;
            $model->save();
        });
    }
}

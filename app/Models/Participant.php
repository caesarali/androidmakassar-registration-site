<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'gender', 'birth_date', 'email', 'phone', 'address'];

    public function user() {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function registrations() {
        return $this->hasMany(Registration::class)->orderBy('created_at', 'desc');
    }

    public function getRegistrationAttribute() {
        return $this->registrations->first();
    }
}

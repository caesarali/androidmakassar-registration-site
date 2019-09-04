<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'username', 'email', 'role_id', 'password', 'last_login_ip', 'last_login_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['last_login_at'];

    public function participant() {
        return $this->hasOne(Participant::class, 'email', 'email');
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function setRole($name) {
        if (is_string($name)) {
            $role = Role::where('name', $name)->first();
            $this->update(['role_id' => $role->id ?? null]);
        }
    }

    public function hasRole($roles) {
        if (is_string($roles)) {
            $roles = [$roles];
        }
        foreach ($roles as $role) {
            if ($this->role->name === $role) return true;
        }
        return false;
    }
}

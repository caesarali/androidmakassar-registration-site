<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'name', 'bank', 'nominal', 'paid_at', 'file'];
    protected $dates = ['paid_at'];

    public function registration() {
        return $this->belongsTo(Registration::class, 'code', 'code');
    }

    public function fileInfo() {
        return pathinfo(asset($this->file));
    }
}

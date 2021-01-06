<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'birth',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function consultation() {
        return $this->belongsTo(Consutation::class);
    }

}

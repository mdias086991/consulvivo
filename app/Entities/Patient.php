<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Entities\Consutation;

class Patient extends Model
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

<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Entities\Consutation;

class Doctor extends Model
{
    protected $fillable = [
        'birth',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function consultationDoctor() {
        return $this->belongsTo(Consutation::class);
    }

}

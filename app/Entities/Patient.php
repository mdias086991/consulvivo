<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'birth',
    ];

    public function userPatient() {
        return $this->belongsTo(User::class);
    }

    public function consultationPatient() {
        return $this->belongsTo(Consutation::class);
    }
}

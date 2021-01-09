<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Doctor;
use App\Entities\Patient;

class Consutation extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function patient() {
        return $this->belongsTo(Patient::class);
    }
}

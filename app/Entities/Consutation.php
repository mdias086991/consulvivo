<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Consutation extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];
}

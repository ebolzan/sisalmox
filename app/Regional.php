<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{

    protected $fillable = [
        'name', 'city', 'address', 'observations', 'local_reference'
    ];
}

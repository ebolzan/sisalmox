<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{

    protected $fillable = [
        'name', 'city', 'address', 'observations', 'local_reference'
    ];

    public static $requiredFields = [
        'name' => 'required',
        'city' => 'required',
        'address' => 'required',
        'local_reference' => 'required',
    ];

    public static $niceNames = [
        'name' => 'Nome', 'city' => 'Cidade', 'address' => 'Endereço',
        'observations' => 'Observações', 'local_reference' => 'Local de referência'
    ];
}

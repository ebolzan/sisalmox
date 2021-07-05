<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{

    protected $guarded = [];

    public static $requiredFields = [
        'name' => 'required',
        'room' => 'required',
        'block' => 'required',
        'email' => 'email',
    ];


    public static $niceNames = [
        'name' => 'Nome', 'room' => 'Sala', 'block' => 'Prédio', 'owner' => 'Endereço ou email do responsável',
        'email' => 'E-mail', 'phone' => 'Telefone'
    ];

    public $timestamps = true;

    public function writers()
    {
        return $this->belongsToMany(Writer::class, 'warehouse_writer');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_warehouse');
    }
}

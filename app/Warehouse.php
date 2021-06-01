<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{

    protected $guarded = [];

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

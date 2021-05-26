<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{

    protected $guarded = [];

    public function writers()
    {
        return $this->belongsToMany(Writer::class, 'warehouse_writer');
    }
}

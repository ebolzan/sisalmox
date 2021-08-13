<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'observation',
        'unity',
        'quantity_min',
        'date_in',
        'date_out',
        'serial_number',
        'file_path',
        'code',
        'warehouse_id',
        'categories_id',
    ];

    public static $requiredFields = [
        'name' => 'required',
        'unity' => 'required',
        'quantity_min' => 'required|numeric|min:0',
        'date_form' => 'required',
        'hour_form' => 'required',
        //'date_in' => 'required',
        //'date_out' => 'required',
        'serial_number' => 'required|numeric',
        'file' => 'mimes:jpeg,png,bpm,jpg|file|max:5000',
        'file_path' => 'required',
        'is_visible' => 'required',
        'code' => 'required',
    ];

    public static $niceNames = [
        'name' => 'nome',
        'unity' => 'unidade',
        'quantity_min' => 'quantidade mínima',
        'date_form' => 'data de entrada',
        'hour_form' => 'hora de entrada',
        'date_in' => 'data de entrada',
        'date_out' => 'data de saída',
        'serial_number' => 'número de série',
        'file_path' => 'arquivo',
        'is_visible' => 'visibilidade',
        'code' => 'código',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function warehouse()
    {
        return $this->belongsTo('App\Warehouse');
    }
}

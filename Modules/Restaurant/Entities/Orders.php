<?php

namespace Modules\Restaurant\Entities;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [];
    protected $casts = [
        'items' => 'array'
    ];
    protected $primaryKey="no";
    public $incrementing=false;
}

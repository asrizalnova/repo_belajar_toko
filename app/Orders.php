<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'Orders';
    public $timestamps = false;

    protected $fillable = ['id_product', 'id_customers', 'tanggal', 'keterangan'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'Pembayaran';
    public $timestamps = false;

    protected $fillable = ['id_pembayaran', 'tanggal_bayar', 'total_bayar', 'id_orders'];
}

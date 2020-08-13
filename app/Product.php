<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'Product';
    public $timestamps = false;

    protected $fillable = ['nama_product', 'harga', 'stok'];
}

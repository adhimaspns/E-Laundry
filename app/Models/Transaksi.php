<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table        = 'transaksi';

    protected $fillable     = [
        'no_transaksi',
        'nama_customer',
        'paket',
        'tgl_awal',
        'tgl_akhir',
        'ongkir',
        'status',
        'grand_total'
    ];
}

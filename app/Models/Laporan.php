<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table        = 'laporan';

    protected $fillable     = [
        'no_transaksi',
        'nama_customer',
        'no_telp',
        'alamat',
        'tgl_awal',
        'tgl_akhir',
        'status',
        'ongkir',
        'grand_total'
    ];

    protected $primaryKey   = 'id_laporan';
}

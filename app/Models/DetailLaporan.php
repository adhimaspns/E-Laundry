<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailLaporan extends Model
{
    protected $table = 'detail_laporan';

    protected $fillable         = [
        'transaksi_id',
        'jenis_laundry_id',
        'jml',
        'harga',
        'subtotal'
    ];

    protected $primaryKey        = 'id_dtl_laporan';
}

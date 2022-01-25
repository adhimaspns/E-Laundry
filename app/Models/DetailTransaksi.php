<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table        = 'detail_transaksi';

    protected $fillable     = [
        'transaksi_id',
        'jenis_laundry_id',
        'jml',
        'harga',
        'subtotal'
    ];

    protected $primaryKey = 'id_dtl_transaksi';

    public function jns_lndry()
    {
        return $this->belongsTo(JenisLaundry::class, 'jenis_laundry_id', 'id_jns_lndry');
    }
}

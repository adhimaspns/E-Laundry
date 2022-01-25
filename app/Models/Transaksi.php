<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table        = 'transaksi';

    protected $fillable     = [
        'no_transaksi',
        'nama_customer',
        'pkt_lndry_id',
        'tgl_awal',
        'tgl_akhir',
        'ongkir',
        'status',
        'grand_total'
    ];

    protected $primaryKey = 'id_transaksi';

    public function paket_laundry_transaksi()
    {
        return $this->belongsTo(PaketLaundry::class, 'pkt_lndry_id', 'id_pkt_lndry');
    }
}

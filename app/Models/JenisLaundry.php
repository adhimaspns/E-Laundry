<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisLaundry extends Model
{
    protected $table        = 'jenis_laundry';

    protected $fillable     = [
        'paket_laundry_id',
        'jenis_laundry',
        'harga'
    ];

    protected $primaryKey   = 'id_jns_lndry';

    public function paket_laundry()
    {
        return $this->belongsTo(PaketLaundry::class, 'paket_laundry_id', 'id_pkt_lndry');
    }

    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'jenis_laundry_id', 'id_jns_lndry');
    }
}

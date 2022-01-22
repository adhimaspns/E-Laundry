<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketLaundry extends Model
{
    protected $table      = 'paket_laundry';

    protected $fillable   = [
        'nama_paket',
        'slug'
    ];

    protected $primaryKey = 'id_pkt_lndry';

    public function jenis_laundry()
    {
        return $this->hasMany(JenisLaundry::class, 'paket_laundry_id', 'id_pkt_lndry');
    }
}

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
}

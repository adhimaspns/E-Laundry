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
}

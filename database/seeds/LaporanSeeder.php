<?php

use Carbon\Carbon;
use App\Models\Laporan;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laporan  = [
            [
                'no_transaksi'      => 202201280001,
                'nama_customer'     => 'Muslimin',
                'no_telp'           => '081615227898',
                'alamat'            => 'Dsn. Mlaten Ds. Mlaten RT/RW 001/002',
                'tgl_awal'          => date('Y-m-d'), 
                'tgl_akhir'         => date('Y-m-d'),
                'ongkir'            => 7500,
                'status'            => "Diproses",
                'grand_total'       => 157500,
                'created_at'        => Carbon::now()   
            ],
        ];

        Laporan::insert($laporan);
    }
}

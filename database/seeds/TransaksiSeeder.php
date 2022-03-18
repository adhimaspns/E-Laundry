<?php

use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaksi  = [
            [
                'no_transaksi'      => 202201280001,
                'nama_customer'     => 'Muslimin',
                'no_telp'           => '081615227898',
                'alamat'            => 'Dsn. Mlaten Ds. Mlaten RT/RW 001/002',
                'pkt_lndry_id'      => 1,
                'tgl_awal'          => date('Y-m-d'), 
                'tgl_akhir'         => date('Y-m-d'),
                'ongkir'            => 7500,
                'status'            => "Diproses",
                'jml'               => 5,
                'grand_total'       => 157500,
                'created_at'        => Carbon::now()   
            ],

            // [
            //     'no_transaksi'      => 202201280003,
            //     'naam_customer'     => 'Badrun',
            //     'pkt_lndry_id'      => 1,
            //     'tgl_awal'          => 2022-01-28, 
            //     'tgl_akhir'         => 2022-01-28,
            //     'ongkir'            => 7500,
            //     'status'            => "Diproses",
            //     'grand_total'       => 157500   
            // ]
        ];

        Transaksi::insert($transaksi);
    }
}

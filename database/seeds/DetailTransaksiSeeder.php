<?php

use Illuminate\Database\Seeder;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detail_transaksi   = [
            'transaksi_id'          => 202201280001, 
            'jenis_laundry_id'      => 1,
            'jml'                   => 5,
            'harga'                 => 30000, 
            'subtotal'              => 150000
        ];

        App\Models\DetailTransaksi::insert($detail_transaksi);
    }
}

<?php

use App\Models\JenisLaundry;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JenisLaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis_laundry = [

            //! Paket Express (1-2 Hari) 
            [
                'paket_laundry_id'      => 1,
                'jenis_laundry'         => 'Cuci + Setrika',
                'harga'                 => 30000,
                'created_at'            => Carbon::now()
            ],
            [
                'paket_laundry_id'      => 1,
                'jenis_laundry'         => 'Cuci Saja',
                'harga'                 => 15000,
                'created_at'            => Carbon::now()
            ],

            //! Paket Super Express 8 Jam 
            [
                'paket_laundry_id'      => 2,
                'jenis_laundry'         => 'Cuci + Setrika',
                'harga'                 => 40000,
                'created_at'            => Carbon::now()
            ],
            [
                'paket_laundry_id'      => 2,
                'jenis_laundry'         => 'Cuci Saja',
                'harga'                 => 20000,
                'created_at'            => Carbon::now()
            ]
        ];

        JenisLaundry::insert($jenis_laundry);
    }
}

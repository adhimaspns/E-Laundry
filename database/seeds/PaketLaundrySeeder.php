<?php

use App\Models\PaketLaundry;
use Illuminate\Database\Seeder;

class PaketLaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paket_laundry = [
            [
                'nama_paket'    => 'Paket Express (1-2 Hari)',
                'slug'          => 'paket-express-1-2-hari'
            ],
            [
                'nama_paket'    => 'Paket Super Express 8 Jam',
                'slug'          => 'paket-super-express-8-jam'
            ]
        ];

        PaketLaundry::insert($paket_laundry);

    }
}

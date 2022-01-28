<?php

use App\Models\JenisLaundry;
use App\Models\PaketLaundry;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PaketLaundrySeeder::class);
        $this->call(JenisLaundrySeeder::class);
        $this->call(UserSeeder::class);
    }
}

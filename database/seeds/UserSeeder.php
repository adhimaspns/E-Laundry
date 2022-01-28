<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'nama'           => "Operator",
            'username'       => "operator",
            'password'       => bcrypt('operator123'),
            'level'          => 'Operator',
            'created_at'     => Carbon::now()
        ];

        User::insert($user);
    }
}

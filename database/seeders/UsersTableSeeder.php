<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::UpdateOrCreate(['id'=> 1], [
            'name' => 'admin',
            'email'=> 'admin@admin.com',
            'password' => '$2y$10$VchjewWieSWyZ6462mMGb.XveQWh99SXG70FuOC5EN3FH4QVIVPG' //password
        ]
    );
    }
}

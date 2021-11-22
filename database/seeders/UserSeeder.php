<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => '5180311005',
            'password' => Hash::make('password'),
            'email' => 'fawait626@gmail.com',
            'no_telp' => '6285772208551',
            'level' => 'mahasiswa',
            'blokir' => 'n'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Pak Operator',
                'email' => 'operator@gmail.com',
                'role' => 'operator',
                'phone' => '0813134646',
                'password' => bcrypt('123123')
            ],
            [
                'name' => 'Pak Keuangan',
                'email' => 'keuangan@gmail.com',
                'role' => 'keuangan',
                'phone' => '0813134646',
                'password' => bcrypt('123123')
            ],
            [
                'name' => 'Pak Marketing',
                'email' => 'marketing@gmail.com',
                'role' => 'marketing',
                'phone' => '0813134646',
                'password' => bcrypt('123123')
            ]
            ];

            foreach ($userData as $key => $val){
                User::create($val);
            }
    }
}

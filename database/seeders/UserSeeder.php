<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'name' => 'Muhammad Hanafi Prasyah',
                'email' => 'prasyah1998@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('hanafiprasyah'),
                'level' => 'Super Admin',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Royce Granada',
                'email' => 'royce.granada@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('roycegranada'),
                'level' => 'Management',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ago Wawaludin',
                'email' => 'ago.wawaludin@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('agowawaludin'),
                'level' => 'Management',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ary Prasetyo',
                'email' => 'aryprasetyot@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('aryprasetyo'),
                'level' => 'Management',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rio Johan R',
                'email' => 'rio.johan@wise.co.id',
                'email_verified_at' => now(),
                'password' => bcrypt('riojohan'),
                'level' => 'Management',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kamtoyo',
                'email' => 'candy.cd496@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('kamtoyotyo'),
                'level' => 'Helpdesk',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Muhammad Nauval R.',
                'email' => 'nauval2801@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('nauvalraihan'),
                'level' => 'Helpdesk',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Azis Ahmad Jarkasih',
                'email' => 'jrkshazis@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('azisahmad'),
                'level' => 'Engineer',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Seno Adikusumo',
                'email' => 'noadikus20@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('senoadikusumo'),
                'level' => 'Helpdesk',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rizky Hendrawan',
                'email' => 'rizkihendrawan317@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('rizkyhendrawan'),
                'level' => 'Engineer',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Muhammad Dendi L.H.',
                'email' => 'dendilkmn@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('dendilukman'),
                'level' => 'Engineer',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Maulana Rifki',
                'email' => 'rifkiceo.2001@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('maulanarifki'),
                'level' => 'Engineer',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'DACSO 1 - Erya',
                'email' => 'erya@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('eryadacso'),
                'level' => 'DACSO',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'DACSO 2 - Rachel',
                'email' => 'rachel@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('racheldacso'),
                'level' => 'DACSO',
                'last_renew_password_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('users')->insert($users);
    }
}

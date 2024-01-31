<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $problems = array(
            array(
                "id" => 1,
                "codex" => "wiseprob-xwu-mtc08012024",
                "name" => "Unit Mati Total",
                "created_at" => "2024-01-08 13:28:08",
                "updated_at" => "2024-01-08 13:28:08",
            ),
            array(
                "id" => 2,
                "codex" => "wiseprob-QNR-mtc08012024",
                "name" => "IPS dalam keadaan Protect Mode",
                "created_at" => "2024-01-08 14:16:39",
                "updated_at" => "2024-01-08 14:16:39",
            ),
            array(
                "id" => 3,
                "codex" => "wiseprob-XML-mtc08012024",
                "name" => "IPS dalam keadaan Overheat",
                "created_at" => "2024-01-08 14:17:03",
                "updated_at" => "2024-01-08 14:17:03",
            ),
        );


        DB::table('problems')->insert($problems);
    }
}

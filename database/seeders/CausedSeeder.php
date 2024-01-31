<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CausedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $causeds = array(
            array(
                "id" => 1,
                "codex" => "wisecsd-9kI-mtc08012024",
                "name" => "Rambatan Petir",
                "created_at" => "2024-01-08 13:28:28",
                "updated_at" => "2024-01-08 13:28:28",
            ),
            array(
                "id" => 2,
                "codex" => "wisecsd-2kD-mtc08012024",
                "name" => "Fuse Pecah",
                "created_at" => "2024-01-08 13:28:28",
                "updated_at" => "2024-01-08 13:28:28",
            ),
            array(
                "id" => 3,
                "codex" => "wisecsd-ieq-mtc15012024",
                "name" => "Unit kotor",
                "created_at" => "2024-01-15 08:37:50",
                "updated_at" => "2024-01-15 08:37:50",
            ),
            array(
                "id" => 4,
                "codex" => "wisecsd-HpA-mtc15012024",
                "name" => "Tegangan PLN drop",
                "created_at" => "2024-01-15 08:38:05",
                "updated_at" => "2024-01-15 08:38:05",
            ),
            array(
                "id" => 5,
                "codex" => "wisecsd-FfO-mtc15012024",
                "name" => "Tegangan PLN tinggi",
                "created_at" => "2024-01-15 08:38:19",
                "updated_at" => "2024-01-15 08:38:19",
            ),
            array(
                "id" => 6,
                "codex" => "wisecsd-ViN-mtc15012024",
                "name" => "Soket/konektor Controller terbakar",
                "created_at" => "2024-01-15 08:38:29",
                "updated_at" => "2024-01-15 08:38:29",
            ),
            array(
                "id" => 7,
                "codex" => "wisecsd-B3n-mtc15012024",
                "name" => "Smart start rusak",
                "created_at" => "2024-01-15 08:38:39",
                "updated_at" => "2024-01-15 08:38:39",
            ),
            array(
                "id" => 8,
                "codex" => "wisecsd-gFV-mtc15012024",
                "name" => "Kontaktor rusak",
                "created_at" => "2024-01-15 08:39:03",
                "updated_at" => "2024-01-15 08:39:03",
            ),
            array(
                "id" => 9,
                "codex" => "wisecsd-m3t-mtc15012024",
                "name" => "MCB lemah",
                "created_at" => "2024-01-15 08:39:06",
                "updated_at" => "2024-01-15 08:39:06",
            ),
            array(
                "id" => 10,
                "codex" => "wisecsd-ibT-mtc15012024",
                "name" => "Input over voltage",
                "created_at" => "2024-01-15 08:39:21",
                "updated_at" => "2024-01-15 08:39:21",
            ),
            array(
                "id" => 11,
                "codex" => "wisecsd-5xd-mtc15012024",
                "name" => "Input under voltage",
                "created_at" => "2024-01-15 08:39:29",
                "updated_at" => "2024-01-15 08:39:29",
            ),
            array(
                "id" => 12,
                "codex" => "wisecsd-ZJ0-mtc15012024",
                "name" => "Kabel di gigit tikus",
                "created_at" => "2024-01-15 08:39:36",
                "updated_at" => "2024-01-15 08:39:36",
            ),
            array(
                "id" => 13,
                "codex" => "wisecsd-fQJ-mtc15012024",
                "name" => "Kabel terbakar",
                "created_at" => "2024-01-15 08:39:43",
                "updated_at" => "2024-01-15 08:39:43",
            ),
        );


        DB::table('causeds')->insert($causeds);
    }
}

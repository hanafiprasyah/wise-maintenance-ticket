<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = array(
            array(
                "id" => 1,
                "name" => "PEMELIHARAAN INTEGRATED PROTECTION SYSTEM (IPS) KAPASITAS 3000VA (3KVA)",
                "codex" => "001-JP-3000 VA",
                "spec" => "PERBAIKAN DAN PEMELIHARAAN",
                "created_at" => "2024-01-22 10:08:50",
                "updated_at" => "2024-01-22 10:08:50",
            ),
            array(
                "id" => 2,
                "name" => "PEMELIHARAAN INTEGRATED PROTECTION SYSTEM (IPS) KAPASITAS 4000VA (4KVA)",
                "codex" => "002-JP-4000 VA",
                "spec" => "PERBAIKAN DAN PEMELIHARAAN",
                "created_at" => "2024-01-22 10:08:50",
                "updated_at" => "2024-01-22 10:08:50",
            ),
            array(
                "id" => 3,
                "name" => "PEMELIHARAAN INTEGRATED PROTECTION SYSTEM (IPS) KAPASITAS 5000VA (5KVA)",
                "codex" => "003-JP-5000 VA",
                "spec" => "PERBAIKAN DAN PEMELIHARAAN",
                "created_at" => "2024-01-22 10:17:01",
                "updated_at" => "2024-01-22 10:17:01",
            ),
            array(
                "id" => 4,
                "name" => "PEMELIHARAAN INTEGRATED PROTECTION SYSTEM (IPS) KAPASITAS 7000VA (7KVA)",
                "codex" => "004-JP-7000 VA",
                "spec" => "PERBAIKAN DAN PEMELIHARAAN",
                "created_at" => "2024-01-22 10:17:15",
                "updated_at" => "2024-01-22 10:17:15",
            ),
            array(
                "id" => 5,
                "name" => "PEMELIHARAAN INTEGRATED PROTECTION SYSTEM (IPS) KAPASITAS 8000VA (8KVA)",
                "codex" => "005-JP-8000 VA",
                "spec" => "PERBAIKAN DAN PEMELIHARAAN",
                "created_at" => "2024-01-22 10:17:26",
                "updated_at" => "2024-01-22 10:17:26",
            ),
            array(
                "id" => 6,
                "name" => "PEMELIHARAAN INTEGRATED PROTECTION SYSTEM (IPS) KAPASITAS 12000VA (12KVA)",
                "codex" => "006-JP-12000 VA",
                "spec" => "PERBAIKAN DAN PEMELIHARAAN",
                "created_at" => "2024-01-22 10:17:35",
                "updated_at" => "2024-01-22 10:17:35",
            ),
            array(
                "id" => 7,
                "name" => "PEMELIHARAAN INTEGRATED PROTECTION SYSTEM (IPS) KAPASITAS 30000VA (30KVA)",
                "codex" => "007-JP-30000 VA",
                "spec" => "PERBAIKAN DAN PEMELIHARAAN",
                "created_at" => "2024-01-22 10:17:43",
                "updated_at" => "2024-01-22 10:17:43",
            ),
            array(
                "id" => 8,
                "name" => "PENGGANTIAN MODUL SMART START IPS SINGLE PHASA / SINGLE ENGINE",
                "codex" => "008-PM-SS-1PH",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:17:55",
                "updated_at" => "2024-01-22 10:17:55",
            ),
            array(
                "id" => 9,
                "name" => "PENGGANTIAN MODUL SMART START IPS 3 PHASA",
                "codex" => "009-PM-SS-3PH",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:18:09",
                "updated_at" => "2024-01-22 10:18:09",
            ),
            array(
                "id" => 10,
                "name" => "PENGGANTIAN MODUL CONTROLLER IPS KAPASITAS 3-KVA SINGLE PHASA",
                "codex" => "010-PM-C-3000 VA-1PH",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:18:21",
                "updated_at" => "2024-01-22 10:18:21",
            ),
            array(
                "id" => 11,
                "name" => "PENGGANTIAN MODUL CONTROLLER IPS KAPASITAS 4-KVA SINGLE PHASA",
                "codex" => "011-PM-C-4000 VA-1PH",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:18:30",
                "updated_at" => "2024-01-22 10:18:30",
            ),
            array(
                "id" => 12,
                "name" => "PENGGANTIAN MODUL CONTROLLER IPS KAPASITAS 5-KVA SINGLE PHASA",
                "codex" => "012-PM-C-5000 VA-1PH",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:18:40",
                "updated_at" => "2024-01-22 10:18:40",
            ),
            array(
                "id" => 13,
                "name" => "PENGGANTIAN MODUL CONTROLLER IPS KAPASITAS 7-KVA SINGLE PHASA",
                "codex" => "013-PM-C-7000 VA-1PH",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:18:50",
                "updated_at" => "2024-01-22 10:18:50",
            ),
            array(
                "id" => 14,
                "name" => "PENGGANTIAN MODUL CONTROLLER IPS KAPASITAS 8-KVA SINGLE PHASA",
                "codex" => "014-PM-C-8000 VA-1PH",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:19:02",
                "updated_at" => "2024-01-22 10:19:02",
            ),
            array(
                "id" => 15,
                "name" => "PENGGANTIAN MODUL MAIN CONTROLLER IPS KAPASITAS 12-KVA 3 PHASA",
                "codex" => "015-PM-MC-12000 VA-3PH",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:19:14",
                "updated_at" => "2024-01-22 10:19:14",
            ),
            array(
                "id" => 16,
                "name" => "PENGGANTIAN MODUL SUB CONTROLLER IPS KAPASITAS 12-KVA 3 PHASA",
                "codex" => "016-PM-SC-12000 VA-3PH",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:19:23",
                "updated_at" => "2024-01-22 10:19:23",
            ),
            array(
                "id" => 17,
                "name" => "PENGGANTIAN MODUL MAIN CONTROLLER IPS KAPASITAS 30-KVA 3 PHASA",
                "codex" => "017-PM-MC-30000 VA-3PH",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:19:33",
                "updated_at" => "2024-01-22 10:19:33",
            ),
            array(
                "id" => 18,
                "name" => "PENGGANTIAN MODUL SUB CONTROLLER IPS KAPASITAS 30-KVA 3 PHASA",
                "codex" => "018-PM-SC-30000 VA-3PH",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:19:45",
                "updated_at" => "2024-01-22 10:19:45",
            ),
            array(
                "id" => 19,
                "name" => "PENGGANTIAN MODUL GROUNDING DISPLAY IPS SINGLE PHASA / 3 PHASA",
                "codex" => "019-PM-GD-1PH/3PH",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:19:54",
                "updated_at" => "2024-01-22 10:19:54",
            ),
            array(
                "id" => 20,
                "name" => "PENGGANTIAN MODUL POWER METER UNIT IPS ",
                "codex" => "020-PM-POM",
                "spec" => "PENGGANTIAN MODUL",
                "created_at" => "2024-01-22 10:20:02",
                "updated_at" => "2024-01-22 10:20:02",
            ),
            array(
                "id" => 21,
                "name" => "JASA PERBAIKAN IDENTIFIKASI KERUSAKAN UNIT IPS ",
                "codex" => "021-JB-IT",
                "spec" => "JASA PERBAIKAN IDENTIFIKASI KERUSAKAN UNIT",
                "created_at" => "2024-01-22 10:20:10",
                "updated_at" => "2024-01-22 10:20:10",
            ),
        );


        DB::table('products')->insert($products);
    }
}

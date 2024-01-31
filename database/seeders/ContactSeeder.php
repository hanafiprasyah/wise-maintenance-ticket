<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = array(
            array(
                "id" => 1,
                "id_resort" => 6,
                "name" => "Widi",
                "phone" => "+6281290050785",
                "created_at" => "2024-01-16 10:25:27",
                "updated_at" => "2024-01-16 10:25:27",
            ),
            array(
                "id" => 2,
                "id_resort" => 3,
                "name" => "Imron",
                "phone" => "+6285691666710",
                "created_at" => "2024-01-16 10:26:24",
                "updated_at" => "2024-01-16 10:26:24",
            ),
            array(
                "id" => 3,
                "id_resort" => 8,
                "name" => "Budi",
                "phone" => "+6285759584948",
                "created_at" => "2024-01-19 13:35:39",
                "updated_at" => "2024-01-19 13:35:39",
            ),
            array(
                "id" => 4,
                "id_resort" => 20,
                "name" => "Sepri",
                "phone" => "+6281245033576",
                "created_at" => "2024-01-19 13:35:55",
                "updated_at" => "2024-01-19 13:35:55",
            ),
            array(
                "id" => 5,
                "id_resort" => 19,
                "name" => "Deni",
                "phone" => "+6282121090804",
                "created_at" => "2024-01-19 13:36:13",
                "updated_at" => "2024-01-19 13:36:13",
            ),
            array(
                "id" => 6,
                "id_resort" => 1,
                "name" => "Agus",
                "phone" => "+6285723988000",
                "created_at" => "2024-01-19 13:36:31",
                "updated_at" => "2024-01-19 13:36:31",
            ),
            array(
                "id" => 7,
                "id_resort" => 2,
                "name" => "Ahmad Ujo",
                "phone" => "+6281321944977",
                "created_at" => "2024-01-19 13:37:40",
                "updated_at" => "2024-01-19 13:37:40",
            ),
            array(
                "id" => 8,
                "id_resort" => 11,
                "name" => "Hamdan",
                "phone" => "+6282120804429",
                "created_at" => "2024-01-19 13:37:54",
                "updated_at" => "2024-01-19 13:37:54",
            ),
            array(
                "id" => 9,
                "id_resort" => 17,
                "name" => "Ali",
                "phone" => "+6282219375310",
                "created_at" => "2024-01-19 13:38:07",
                "updated_at" => "2024-01-19 13:38:07",
            ),
            array(
                "id" => 10,
                "id_resort" => 13,
                "name" => "Zaki",
                "phone" => "+6281290120006",
                "created_at" => "2024-01-19 13:38:21",
                "updated_at" => "2024-01-19 13:38:21",
            ),
            array(
                "id" => 11,
                "id_resort" => 18,
                "name" => "Alvin",
                "phone" => "+6285221229372",
                "created_at" => "2024-01-19 13:38:32",
                "updated_at" => "2024-01-19 13:38:32",
            ),
            array(
                "id" => 12,
                "id_resort" => 14,
                "name" => "Topan",
                "phone" => "+6283123088517",
                "created_at" => "2024-01-19 13:38:45",
                "updated_at" => "2024-01-19 13:38:45",
            ),
            array(
                "id" => 13,
                "id_resort" => 12,
                "name" => "Dedi",
                "phone" => "+6282320556464",
                "created_at" => "2024-01-19 13:38:55",
                "updated_at" => "2024-01-19 13:38:55",
            ),
            array(
                "id" => 14,
                "id_resort" => 4,
                "name" => "Soni",
                "phone" => "+6281394280077",
                "created_at" => "2024-01-19 13:39:11",
                "updated_at" => "2024-01-19 13:39:11",
            ),
            array(
                "id" => 15,
                "id_resort" => 10,
                "name" => "Sembiring",
                "phone" => "+62818271071",
                "created_at" => "2024-01-19 13:39:26",
                "updated_at" => "2024-01-19 13:39:26",
            ),
            array(
                "id" => 16,
                "id_resort" => 15,
                "name" => "Herman",
                "phone" => "+6282127000075",
                "created_at" => "2024-01-19 13:39:38",
                "updated_at" => "2024-01-19 13:39:38",
            ),
            array(
                "id" => 17,
                "id_resort" => 21,
                "name" => "Dadang",
                "phone" => "+6281375080893",
                "created_at" => "2024-01-19 13:39:50",
                "updated_at" => "2024-01-19 13:39:50",
            ),
            array(
                "id" => 18,
                "id_resort" => 5,
                "name" => "Dena",
                "phone" => "+6282128153022",
                "created_at" => "2024-01-19 13:40:13",
                "updated_at" => "2024-01-19 13:40:13",
            ),
            array(
                "id" => 19,
                "id_resort" => 23,
                "name" => "Aan",
                "phone" => "+6281335580005",
                "created_at" => "2024-01-19 13:40:25",
                "updated_at" => "2024-01-19 13:40:25",
            ),
            array(
                "id" => 20,
                "id_resort" => 22,
                "name" => "Iwan Taher",
                "phone" => "+6282121747821",
                "created_at" => "2024-01-19 13:40:37",
                "updated_at" => "2024-01-19 13:40:37",
            ),
            array(
                "id" => 21,
                "id_resort" => 7,
                "name" => "Andri",
                "phone" => "+6285223700273",
                "created_at" => "2024-01-19 13:40:48",
                "updated_at" => "2024-01-19 13:40:48",
            ),
            array(
                "id" => 22,
                "id_resort" => 16,
                "name" => "Yang yang",
                "phone" => "+6281284051354",
                "created_at" => "2024-01-19 13:41:01",
                "updated_at" => "2024-01-19 13:41:01",
            ),
        );


        DB::table('contacts')->insert($contacts);
    }
}

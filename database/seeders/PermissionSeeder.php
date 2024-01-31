<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = array(
            array(
                "id" => 1,
                "name" => "view-any Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 3,
                "name" => "view Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 5,
                "name" => "create Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 7,
                "name" => "update Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 9,
                "name" => "delete Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 11,
                "name" => "restore Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 13,
                "name" => "force-delete Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 15,
                "name" => "replicate Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 17,
                "name" => "reorder Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 19,
                "name" => "view-any Caused",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 21,
                "name" => "view Caused",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 23,
                "name" => "create Caused",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 25,
                "name" => "update Caused",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 27,
                "name" => "delete Caused",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 29,
                "name" => "restore Caused",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 31,
                "name" => "force-delete Caused",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 33,
                "name" => "replicate Caused",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 35,
                "name" => "reorder Caused",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 37,
                "name" => "view-any Contact",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 39,
                "name" => "view Contact",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 41,
                "name" => "create Contact",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 43,
                "name" => "update Contact",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 45,
                "name" => "delete Contact",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 47,
                "name" => "restore Contact",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 49,
                "name" => "force-delete Contact",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 51,
                "name" => "replicate Contact",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 53,
                "name" => "reorder Contact",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 55,
                "name" => "view-any Item",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 57,
                "name" => "view Item",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 59,
                "name" => "create Item",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 61,
                "name" => "update Item",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 63,
                "name" => "delete Item",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 65,
                "name" => "restore Item",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 67,
                "name" => "force-delete Item",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 69,
                "name" => "replicate Item",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 71,
                "name" => "reorder Item",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 73,
                "name" => "view-any Maintenance",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 75,
                "name" => "view Maintenance",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 77,
                "name" => "create Maintenance",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 79,
                "name" => "update Maintenance",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 81,
                "name" => "delete Maintenance",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 83,
                "name" => "restore Maintenance",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 85,
                "name" => "force-delete Maintenance",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 87,
                "name" => "replicate Maintenance",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 89,
                "name" => "reorder Maintenance",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 91,
                "name" => "view-any Problem",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 93,
                "name" => "view Problem",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 95,
                "name" => "create Problem",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 97,
                "name" => "update Problem",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 99,
                "name" => "delete Problem",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 101,
                "name" => "restore Problem",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 103,
                "name" => "force-delete Problem",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 105,
                "name" => "replicate Problem",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 107,
                "name" => "reorder Problem",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 109,
                "name" => "view-any Resort",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 111,
                "name" => "view Resort",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 113,
                "name" => "create Resort",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 115,
                "name" => "update Resort",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 117,
                "name" => "delete Resort",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 119,
                "name" => "restore Resort",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 121,
                "name" => "force-delete Resort",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 123,
                "name" => "replicate Resort",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 125,
                "name" => "reorder Resort",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 127,
                "name" => "view-any Site",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 129,
                "name" => "view Site",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 131,
                "name" => "create Site",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 133,
                "name" => "update Site",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 135,
                "name" => "delete Site",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 137,
                "name" => "restore Site",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 139,
                "name" => "force-delete Site",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 141,
                "name" => "replicate Site",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 143,
                "name" => "reorder Site",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 145,
                "name" => "view-any Timeline",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 147,
                "name" => "view Timeline",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 149,
                "name" => "create Timeline",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 151,
                "name" => "update Timeline",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 153,
                "name" => "delete Timeline",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 155,
                "name" => "restore Timeline",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 157,
                "name" => "force-delete Timeline",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 159,
                "name" => "replicate Timeline",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 161,
                "name" => "reorder Timeline",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 163,
                "name" => "view-any User",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 165,
                "name" => "view User",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 167,
                "name" => "create User",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 169,
                "name" => "update User",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 171,
                "name" => "delete User",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 173,
                "name" => "restore User",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 175,
                "name" => "force-delete User",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 177,
                "name" => "replicate User",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 179,
                "name" => "reorder User",
                "guard_name" => "web",
                "created_at" => "2024-01-12 20:05:11",
                "updated_at" => "2024-01-12 20:05:11",
            ),
            array(
                "id" => 271,
                "name" => "mark-as-done Maintenance",
                "guard_name" => "web",
                "created_at" => "2024-01-12 21:31:22",
                "updated_at" => "2024-01-12 21:31:22",
            ),
            array(
                "id" => 272,
                "name" => "update-close-ticket Maintenance",
                "guard_name" => "web",
                "created_at" => "2024-01-13 11:36:05",
                "updated_at" => "2024-01-13 11:36:05",
            ),
            array(
                "id" => 273,
                "name" => "reject Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-14 10:24:54",
                "updated_at" => "2024-01-14 10:24:54",
            ),
            array(
                "id" => 274,
                "name" => "approve Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-14 10:25:12",
                "updated_at" => "2024-01-14 10:25:12",
            ),
            array(
                "id" => 275,
                "name" => "pending Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-14 10:25:28",
                "updated_at" => "2024-01-14 10:25:28",
            ),
            array(
                "id" => 276,
                "name" => "can-view-value Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-22 15:25:56",
                "updated_at" => "2024-01-22 15:25:56",
            ),
            array(
                "id" => 277,
                "name" => "download-pdf Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-22 15:30:34",
                "updated_at" => "2024-01-22 15:30:34",
            ),
            array(
                "id" => 278,
                "name" => "view-detail Budget",
                "guard_name" => "web",
                "created_at" => "2024-01-22 15:36:12",
                "updated_at" => "2024-01-22 15:36:12",
            ),
            array(
                "id" => 279,
                "name" => "dispatch-ticket Maintenance",
                "guard_name" => "web",
                "created_at" => "2024-01-22 17:02:28",
                "updated_at" => "2024-01-22 17:02:28",
            ),
            array(
                "id" => 280,
                "name" => "view-any Product",
                "guard_name" => "web",
                "created_at" => "2024-01-22 17:06:12",
                "updated_at" => "2024-01-22 17:06:12",
            ),
            array(
                "id" => 281,
                "name" => "view Product",
                "guard_name" => "web",
                "created_at" => "2024-01-22 17:07:13",
                "updated_at" => "2024-01-22 17:07:13",
            ),
            array(
                "id" => 282,
                "name" => "create Product",
                "guard_name" => "web",
                "created_at" => "2024-01-22 17:07:35",
                "updated_at" => "2024-01-22 17:07:35",
            ),
            array(
                "id" => 283,
                "name" => "update Product",
                "guard_name" => "web",
                "created_at" => "2024-01-22 17:08:11",
                "updated_at" => "2024-01-22 17:08:11",
            ),
            array(
                "id" => 284,
                "name" => "delete Product",
                "guard_name" => "web",
                "created_at" => "2024-01-22 17:08:21",
                "updated_at" => "2024-01-22 17:08:21",
            ),
            array(
                "id" => 285,
                "name" => "restore Product",
                "guard_name" => "web",
                "created_at" => "2024-01-22 17:08:31",
                "updated_at" => "2024-01-22 17:08:31",
            ),
            array(
                "id" => 286,
                "name" => "force-delete Product",
                "guard_name" => "web",
                "created_at" => "2024-01-22 17:08:42",
                "updated_at" => "2024-01-22 17:08:42",
            ),
            array(
                "id" => 287,
                "name" => "replicate Product",
                "guard_name" => "web",
                "created_at" => "2024-01-22 17:08:57",
                "updated_at" => "2024-01-22 17:08:57",
            ),
            array(
                "id" => 288,
                "name" => "reorder Product",
                "guard_name" => "web",
                "created_at" => "2024-01-22 17:09:09",
                "updated_at" => "2024-01-22 17:09:09",
            ),
            array(
                "id" => 289,
                "name" => "unlock",
                "guard_name" => "web",
                "created_at" => "2024-01-23 11:47:53",
                "updated_at" => "2024-01-23 11:47:53",
            ),
            array(
                "id" => 290,
                "name" => "view-any Report",
                "guard_name" => "web",
                "created_at" => "2024-01-24 13:01:10",
                "updated_at" => "2024-01-24 13:01:10",
            ),
            array(
                "id" => 291,
                "name" => "view Report",
                "guard_name" => "web",
                "created_at" => "2024-01-24 13:01:22",
                "updated_at" => "2024-01-24 13:01:22",
            ),
            array(
                "id" => 292,
                "name" => "create Report",
                "guard_name" => "web",
                "created_at" => "2024-01-24 13:01:36",
                "updated_at" => "2024-01-24 13:01:36",
            ),
            array(
                "id" => 293,
                "name" => "update Report",
                "guard_name" => "web",
                "created_at" => "2024-01-24 13:01:45",
                "updated_at" => "2024-01-24 13:01:45",
            ),
            array(
                "id" => 294,
                "name" => "delete Report",
                "guard_name" => "web",
                "created_at" => "2024-01-24 13:01:56",
                "updated_at" => "2024-01-24 13:01:56",
            ),
            array(
                "id" => 295,
                "name" => "restore Report",
                "guard_name" => "web",
                "created_at" => "2024-01-24 13:02:04",
                "updated_at" => "2024-01-24 13:02:04",
            ),
            array(
                "id" => 296,
                "name" => "force-delete Report",
                "guard_name" => "web",
                "created_at" => "2024-01-24 13:02:16",
                "updated_at" => "2024-01-24 13:02:16",
            ),
            array(
                "id" => 297,
                "name" => "replicate Report",
                "guard_name" => "web",
                "created_at" => "2024-01-24 13:02:23",
                "updated_at" => "2024-01-24 13:02:23",
            ),
            array(
                "id" => 298,
                "name" => "reorder Report",
                "guard_name" => "web",
                "created_at" => "2024-01-24 13:02:33",
                "updated_at" => "2024-01-24 13:02:33",
            ),
        );

        DB::table('permissions')->insert($permissions);
    }
}

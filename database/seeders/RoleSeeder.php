<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = array(
            array(
                "id" => 1,
                "name" => "Management",
                "guard_name" => "web",
                "created_at" => "2024-01-10 19:36:32",
                "updated_at" => "2024-01-30 11:32:22",
            ),
            array(
                "id" => 2,
                "name" => "Engineer",
                "guard_name" => "web",
                "created_at" => "2024-01-10 19:36:38",
                "updated_at" => "2024-01-30 11:32:42",
            ),
            array(
                "id" => 3,
                "name" => "DACSO",
                "guard_name" => "web",
                "created_at" => "2024-01-10 19:36:49",
                "updated_at" => "2024-01-17 14:31:09",
            ),
            array(
                "id" => 5,
                "name" => "Helpdesk",
                "guard_name" => "web",
                "created_at" => "2024-01-10 19:37:00",
                "updated_at" => "2024-01-10 19:37:00",
            ),
            array(
                "id" => 6,
                "name" => "Super Admin",
                "guard_name" => "web",
                "created_at" => "2024-01-10 20:43:13",
                "updated_at" => "2024-01-10 20:43:13",
            ),
        );

        $model_has_roles = array(
            array(
                "role_id" => 6,
                "model_type" => "App\\Models\\User",
                "model_id" => 1,
            ),
            array(
                "role_id" => 1,
                "model_type" => "App\\Models\\User",
                "model_id" => 2,
            ),
            array(
                "role_id" => 1,
                "model_type" => "App\\Models\\User",
                "model_id" => 3,
            ),
            array(
                "role_id" => 1,
                "model_type" => "App\\Models\\User",
                "model_id" => 4,
            ),
            array(
                "role_id" => 1,
                "model_type" => "App\\Models\\User",
                "model_id" => 5,
            ),
            array(
                "role_id" => 5,
                "model_type" => "App\\Models\\User",
                "model_id" => 6,
            ),
            array(
                "role_id" => 5,
                "model_type" => "App\\Models\\User",
                "model_id" => 7,
            ),
            array(
                "role_id" => 2,
                "model_type" => "App\\Models\\User",
                "model_id" => 8,
            ),
            array(
                "role_id" => 5,
                "model_type" => "App\\Models\\User",
                "model_id" => 9,
            ),
            array(
                "role_id" => 2,
                "model_type" => "App\\Models\\User",
                "model_id" => 10,
            ),
            array(
                "role_id" => 2,
                "model_type" => "App\\Models\\User",
                "model_id" => 11,
            ),
            array(
                "role_id" => 2,
                "model_type" => "App\\Models\\User",
                "model_id" => 12,
            ),
            array(
                "role_id" => 3,
                "model_type" => "App\\Models\\User",
                "model_id" => 13,
            ),
            array(
                "role_id" => 3,
                "model_type" => "App\\Models\\User",
                "model_id" => 14,
            ),
            array(
                "role_id" => 3,
                "model_type" => "App\\Models\\User",
                "model_id" => 15,
            ),
        );

        $role_has_permissions = array(
            array(
                "permission_id" => 1,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 3,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 19,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 21,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 37,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 39,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 55,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 57,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 73,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 75,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 91,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 93,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 109,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 111,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 127,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 129,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 145,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 147,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 163,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 165,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 273,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 274,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 276,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 277,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 278,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 280,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 281,
                "role_id" => 1,
            ),
            array(
                "permission_id" => 1,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 3,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 55,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 57,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 59,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 61,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 73,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 75,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 109,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 111,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 113,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 115,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 127,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 129,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 131,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 133,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 145,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 147,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 149,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 271,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 277,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 280,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 281,
                "role_id" => 2,
            ),
            array(
                "permission_id" => 1,
                "role_id" => 3,
            ),
            array(
                "permission_id" => 3,
                "role_id" => 3,
            ),
            array(
                "permission_id" => 73,
                "role_id" => 3,
            ),
            array(
                "permission_id" => 75,
                "role_id" => 3,
            ),
            array(
                "permission_id" => 77,
                "role_id" => 3,
            ),
            array(
                "permission_id" => 272,
                "role_id" => 3,
            ),
            array(
                "permission_id" => 1,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 3,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 5,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 7,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 37,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 39,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 41,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 55,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 57,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 59,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 73,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 75,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 127,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 129,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 131,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 133,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 145,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 147,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 149,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 271,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 276,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 277,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 278,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 279,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 280,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 281,
                "role_id" => 5,
            ),
            array(
                "permission_id" => 1,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 3,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 5,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 7,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 9,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 11,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 13,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 15,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 17,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 19,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 21,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 23,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 25,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 27,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 29,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 31,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 33,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 35,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 37,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 39,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 41,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 43,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 45,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 47,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 49,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 51,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 53,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 55,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 57,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 59,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 61,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 63,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 65,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 67,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 69,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 71,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 73,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 75,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 77,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 79,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 81,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 83,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 85,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 87,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 89,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 91,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 93,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 95,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 97,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 99,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 101,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 103,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 105,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 107,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 109,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 111,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 113,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 115,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 117,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 119,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 121,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 123,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 125,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 127,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 129,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 131,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 133,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 135,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 137,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 139,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 141,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 143,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 145,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 147,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 149,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 151,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 153,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 155,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 157,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 159,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 161,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 163,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 165,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 167,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 169,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 171,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 173,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 175,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 177,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 179,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 271,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 272,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 273,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 274,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 275,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 276,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 277,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 278,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 279,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 280,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 281,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 282,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 283,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 284,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 285,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 286,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 287,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 288,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 289,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 290,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 291,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 292,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 293,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 294,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 295,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 296,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 297,
                "role_id" => 6,
            ),
            array(
                "permission_id" => 298,
                "role_id" => 6,
            ),
        );

        DB::table('roles')->insert($roles);
        DB::table('model_has_roles')->insert($model_has_roles);
        DB::table('role_has_permissions')->insert($role_has_permissions);
    }
}

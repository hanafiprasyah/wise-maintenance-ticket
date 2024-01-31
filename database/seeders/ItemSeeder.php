<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = array(
            array(
                "id" => 1,
                "name" => "Contactor",
                "unit" => "Unit",
                "price_int" => 10000,
                "editor" => "Muhammad Hanafi Prasyah",
                "created_at" => "2024-01-14 09:43:10",
                "updated_at" => "2024-01-14 09:43:10",
            ),
            array(
                "id" => 2,
                "name" => "Controller",
                "unit" => "Unit",
                "price_int" => 550000,
                "editor" => "Muhammad Hanafi Prasyah",
                "created_at" => "2024-01-14 09:43:10",
                "updated_at" => "2024-01-14 09:43:10",
            ),
            array(
                "id" => 3,
                "name" => "Smart Start",
                "unit" => "Unit",
                "price_int" => 1250000,
                "editor" => "Muhammad Hanafi Prasyah",
                "created_at" => "2024-01-14 09:43:10",
                "updated_at" => "2024-01-14 09:43:10",
            ),
            array(
                "id" => 4,
                "name" => "Display Ground",
                "unit" => "Pcs",
                "price_int" => 325000,
                "editor" => "Muhammad Hanafi Prasyah",
                "created_at" => "2024-01-14 09:43:10",
                "updated_at" => "2024-01-14 09:43:10",
            ),
            array(
                "id" => 5,
                "name" => "Rumah Fuse",
                "unit" => "Pcs",
                "price_int" => 50000,
                "editor" => "Muhammad Hanafi Prasyah",
                "created_at" => "2024-01-14 09:43:10",
                "updated_at" => "2024-01-14 09:43:10",
            ),
            array(
                "id" => 6,
                "name" => "Fuse",
                "unit" => "Pcs",
                "price_int" => 35000,
                "editor" => "Muhammad Hanafi Prasyah",
                "created_at" => "2024-01-14 09:43:10",
                "updated_at" => "2024-01-14 09:43:10",
            ),
            array(
                "id" => 7,
                "name" => "Carbon Brush",
                "unit" => "Pcs",
                "price_int" => 15000,
                "editor" => "Muhammad Hanafi Prasyah",
                "created_at" => "2024-01-14 09:43:10",
                "updated_at" => "2024-01-14 09:43:10",
            ),
            array(
                "id" => 8,
                "name" => "Thermostart",
                "unit" => "Pcs",
                "price_int" => 70000,
                "editor" => "Muhammad Hanafi Prasyah",
                "created_at" => "2024-01-14 09:43:10",
                "updated_at" => "2024-01-14 09:43:10",
            ),
            array(
                "id" => 9,
                "name" => "Socket Connector",
                "unit" => "Pcs",
                "price_int" => 150000,
                "editor" => "Muhammad Hanafi Prasyah",
                "created_at" => "2024-01-14 09:43:10",
                "updated_at" => "2024-01-14 09:43:10",
            ),
            array(
                "id" => 10,
                "name" => "Kabel Kontrol",
                "unit" => "Meter",
                "price_int" => 2500,
                "editor" => "Muhammad Hanafi Prasyah",
                "created_at" => "2024-01-14 09:43:10",
                "updated_at" => "2024-01-14 09:43:10",
            ),
            array(
                "id" => 11,
                "name" => "Power Meter",
                "unit" => "Unit",
                "price_int" => 675000,
                "editor" => "Muhammad Hanafi Prasyah",
                "created_at" => "2024-01-14 09:43:10",
                "updated_at" => "2024-01-14 09:43:10",
            ),
            array(
                "id" => 12,
                "name" => "Fan Assy",
                "unit" => "Unit",
                "price_int" => 225000,
                "editor" => "Muhammad Hanafi Prasyah",
                "created_at" => "2024-01-14 09:43:10",
                "updated_at" => "2024-01-14 09:43:10",
            ),
        );


        DB::table('items')->insert($items);
    }
}

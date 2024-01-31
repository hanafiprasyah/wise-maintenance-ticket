<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sites = array(
            array('id' => '1', 'id_resort' => '17', 'name' => 'Jatiluhur', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 07:57:13', 'updated_at' => '2024-01-03 08:13:31'),
            array('id' => '2', 'id_resort' => '15', 'name' => 'Gunung Arga Pura', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 07:59:43', 'updated_at' => '2024-01-03 08:13:44'),
            array('id' => '3', 'id_resort' => '15', 'name' => 'Gunung Seda', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:04:11', 'updated_at' => '2024-01-03 08:14:09'),
            array('id' => '4', 'id_resort' => '13', 'name' => 'Telkom Karawang', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:14:33', 'updated_at' => '2024-01-03 08:14:33'),
            array('id' => '5', 'id_resort' => '21', 'name' => 'Tampomas', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:14:57', 'updated_at' => '2024-01-03 08:14:57'),
            array('id' => '6', 'id_resort' => '1', 'name' => 'Mapolda Bandung', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:15:23', 'updated_at' => '2024-01-03 08:15:23'),
            array('id' => '7', 'id_resort' => '11', 'name' => 'Cikuray', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:15:43', 'updated_at' => '2024-01-03 08:15:43'),
            array('id' => '8', 'id_resort' => '1', 'name' => 'Cidadap', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:16:14', 'updated_at' => '2024-01-03 08:16:14'),
            array('id' => '9', 'id_resort' => '1', 'name' => 'MSO Bandung', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:16:26', 'updated_at' => '2024-01-03 08:16:26'),
            array('id' => '10', 'id_resort' => '1', 'name' => 'Data Center', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:16:36', 'updated_at' => '2024-01-03 08:16:36'),
            array('id' => '11', 'id_resort' => '18', 'name' => 'Gunung Tangkuban', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:16:48', 'updated_at' => '2024-01-03 08:16:48'),
            array('id' => '12', 'id_resort' => '6', 'name' => 'Gunung Salak', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:17:12', 'updated_at' => '2024-01-03 08:17:12'),
            array('id' => '13', 'id_resort' => '22', 'name' => 'Pasir Ipis', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:17:32', 'updated_at' => '2024-01-03 08:17:32'),
            array('id' => '14', 'id_resort' => '1', 'name' => 'Gunung Serewen', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:17:47', 'updated_at' => '2024-01-03 08:17:47'),
            array('id' => '15', 'id_resort' => '14', 'name' => 'Gunung Palutungan', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:18:08', 'updated_at' => '2024-01-03 08:18:08'),
            array('id' => '16', 'id_resort' => '19', 'name' => 'Citamiyang', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:18:20', 'updated_at' => '2024-01-03 08:18:20'),
            array('id' => '17', 'id_resort' => '12', 'name' => 'Losarang', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:18:29', 'updated_at' => '2024-01-03 08:18:29'),
            array('id' => '18', 'id_resort' => '5', 'name' => 'Gunung Babakan', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:18:39', 'updated_at' => '2024-01-03 08:18:39'),
            array('id' => '19', 'id_resort' => '8', 'name' => 'Gunung Gedeh', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:19:22', 'updated_at' => '2024-01-03 08:19:22'),
            array('id' => '20', 'id_resort' => '3', 'name' => 'Gunung Tela', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:19:49', 'updated_at' => '2024-01-03 08:19:49'),
            array('id' => '21', 'id_resort' => '19', 'name' => 'Cigaru', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:20:19', 'updated_at' => '2024-01-03 08:20:19'),
            array('id' => '22', 'id_resort' => '23', 'name' => 'Gunung Syawal', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:47:03', 'updated_at' => '2024-01-03 08:47:03'),
            array('id' => '23', 'id_resort' => '8', 'name' => 'Brengbreng', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:47:16', 'updated_at' => '2024-01-03 08:47:16'),
            array('id' => '24', 'id_resort' => '19', 'name' => 'Parungkuda', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:47:33', 'updated_at' => '2024-01-03 08:47:33'),
            array('id' => '25', 'id_resort' => '10', 'name' => 'Mapolresta Cirebon', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:47:51', 'updated_at' => '2024-01-03 08:47:51'),
            array('id' => '26', 'id_resort' => '7', 'name' => 'Gunung Tugel', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:48:03', 'updated_at' => '2024-01-03 08:48:03'),
            array('id' => '27', 'id_resort' => '11', 'name' => 'Gunung Holan', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:48:24', 'updated_at' => '2024-01-03 08:48:24'),
            array('id' => '28', 'id_resort' => '21', 'name' => 'Jingkang', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:48:33', 'updated_at' => '2024-01-03 08:48:33'),
            array('id' => '29', 'id_resort' => '14', 'name' => 'Subang', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:48:45', 'updated_at' => '2024-01-03 08:48:45'),
            array('id' => '30', 'id_resort' => '9', 'name' => 'Gunung Halu', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:48:57', 'updated_at' => '2024-01-03 08:48:57'),
            array('id' => '31', 'id_resort' => '1', 'name' => 'Pangalengan', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:49:11', 'updated_at' => '2024-01-03 08:49:11'),
            array('id' => '32', 'id_resort' => '1', 'name' => 'Mapolresta Bandung', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:49:23', 'updated_at' => '2024-01-03 08:49:23'),
            array('id' => '33', 'id_resort' => '16', 'name' => 'Cijulang', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:49:40', 'updated_at' => '2024-01-03 09:00:05'),
            array('id' => '34', 'id_resort' => '19', 'name' => 'Lengkong', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:49:50', 'updated_at' => '2024-01-03 08:49:50'),
            array('id' => '35', 'id_resort' => '7', 'name' => 'Pangandaran', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:49:59', 'updated_at' => '2024-01-03 08:49:59'),
            array('id' => '36', 'id_resort' => '17', 'name' => 'Plered', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:50:09', 'updated_at' => '2024-01-03 08:50:09'),
            array('id' => '37', 'id_resort' => '11', 'name' => 'Bungbulang', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:50:17', 'updated_at' => '2024-01-03 08:50:17'),
            array('id' => '38', 'id_resort' => '3', 'name' => 'Bogor Kota', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:50:27', 'updated_at' => '2024-01-03 08:50:27'),
            array('id' => '39', 'id_resort' => '6', 'name' => 'Kembang Kuning', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:50:41', 'updated_at' => '2024-01-03 08:50:41'),
            array('id' => '40', 'id_resort' => '3', 'name' => 'Tegal Lega', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:50:54', 'updated_at' => '2024-01-03 08:50:54'),
            array('id' => '41', 'id_resort' => '20', 'name' => 'Mapolres Sukabumi', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:51:10', 'updated_at' => '2024-01-03 08:51:10'),
            array('id' => '42', 'id_resort' => '20', 'name' => 'Surade', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:51:19', 'updated_at' => '2024-01-03 08:51:19'),
            array('id' => '43', 'id_resort' => '13', 'name' => 'Klari', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:51:28', 'updated_at' => '2024-01-03 08:51:28'),
            array('id' => '44', 'id_resort' => '18', 'name' => 'Mapolres Subang', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:51:40', 'updated_at' => '2024-01-03 08:51:40'),
            array('id' => '45', 'id_resort' => '2', 'name' => 'Ciwidey', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:51:51', 'updated_at' => '2024-01-03 08:51:51'),
            array('id' => '46', 'id_resort' => '12', 'name' => 'Mapolresta Indramayu', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:52:06', 'updated_at' => '2024-01-03 08:52:06'),
            array('id' => '47', 'id_resort' => '7', 'name' => 'Mapolres Ciamis', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:52:17', 'updated_at' => '2024-01-03 08:52:17'),
            array('id' => '48', 'id_resort' => '22', 'name' => 'Kadipaten', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:52:30', 'updated_at' => '2024-01-03 08:52:30'),
            array('id' => '49', 'id_resort' => '22', 'name' => 'Cineam', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:52:43', 'updated_at' => '2024-01-03 08:52:43'),
            array('id' => '50', 'id_resort' => '22', 'name' => 'Pamayang', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:52:51', 'updated_at' => '2024-01-03 08:52:51'),
            array('id' => '51', 'id_resort' => '22', 'name' => 'Parung Ponteng', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:53:00', 'updated_at' => '2024-01-03 08:53:00'),
            array('id' => '52', 'id_resort' => '22', 'name' => 'Cibalong', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:53:12', 'updated_at' => '2024-01-03 08:53:12'),
            array('id' => '53', 'id_resort' => '22', 'name' => 'Cilumba', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:53:20', 'updated_at' => '2024-01-03 08:53:20'),
            array('id' => '54', 'id_resort' => '22', 'name' => 'Taraju', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:53:30', 'updated_at' => '2024-01-03 08:53:30'),
            array('id' => '55', 'id_resort' => '7', 'name' => 'Tambaksari', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:53:40', 'updated_at' => '2024-01-03 08:53:40'),
            array('id' => '56', 'id_resort' => '6', 'name' => 'Cariu', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:54:13', 'updated_at' => '2024-01-03 08:54:13'),
            array('id' => '57', 'id_resort' => '6', 'name' => 'Sukamakmur', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:54:28', 'updated_at' => '2024-01-03 08:54:28'),
            array('id' => '58', 'id_resort' => '6', 'name' => 'Hotel Salak Tower', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:54:42', 'updated_at' => '2024-01-03 08:54:42'),
            array('id' => '59', 'id_resort' => '19', 'name' => 'Warung Kiara', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:54:54', 'updated_at' => '2024-01-03 08:54:54'),
            array('id' => '60', 'id_resort' => '19', 'name' => 'Purabaya', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:55:06', 'updated_at' => '2024-01-03 08:55:06'),
            array('id' => '61', 'id_resort' => '8', 'name' => 'Naringul', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:55:19', 'updated_at' => '2024-01-03 08:55:19'),
            array('id' => '62', 'id_resort' => '8', 'name' => 'Pacet', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:55:25', 'updated_at' => '2024-01-03 08:55:25'),
            array('id' => '63', 'id_resort' => '8', 'name' => 'Pasir Sumbul', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:55:47', 'updated_at' => '2024-01-03 08:55:47'),
            array('id' => '64', 'id_resort' => '11', 'name' => 'Banjar Wangi', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:56:03', 'updated_at' => '2024-01-03 08:56:03'),
            array('id' => '65', 'id_resort' => '11', 'name' => 'Cisompet', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:56:09', 'updated_at' => '2024-01-03 08:56:09'),
            array('id' => '66', 'id_resort' => '11', 'name' => 'Cikelet', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:56:17', 'updated_at' => '2024-01-03 08:56:17'),
            array('id' => '67', 'id_resort' => '11', 'name' => 'Cisewu', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:56:36', 'updated_at' => '2024-01-03 08:56:36'),
            array('id' => '68', 'id_resort' => '11', 'name' => 'Cigadogan', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:56:48', 'updated_at' => '2024-01-03 08:56:48'),
            array('id' => '69', 'id_resort' => '11', 'name' => 'Pasir Wangi', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:56:58', 'updated_at' => '2024-01-03 08:56:58'),
            array('id' => '70', 'id_resort' => '17', 'name' => 'Maniis', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:57:08', 'updated_at' => '2024-01-03 08:57:08'),
            array('id' => '71', 'id_resort' => '12', 'name' => 'Gantar', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:57:17', 'updated_at' => '2024-01-03 08:57:17'),
            array('id' => '72', 'id_resort' => '12', 'name' => 'Lohbener', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:57:27', 'updated_at' => '2024-01-03 08:57:27'),
            array('id' => '73', 'id_resort' => '12', 'name' => 'Jatibarang', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:57:37', 'updated_at' => '2024-01-03 08:57:37'),
            array('id' => '74', 'id_resort' => '15', 'name' => 'Lembah Sugih', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:57:46', 'updated_at' => '2024-01-03 08:57:46'),
            array('id' => '75', 'id_resort' => '15', 'name' => 'Sadarehe', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:57:56', 'updated_at' => '2024-01-03 08:57:56'),
            array('id' => '76', 'id_resort' => '18', 'name' => 'Ciater', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:58:06', 'updated_at' => '2024-01-03 08:58:06'),
            array('id' => '77', 'id_resort' => '18', 'name' => 'Ciasem', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:58:16', 'updated_at' => '2024-01-03 08:58:16'),
            array('id' => '78', 'id_resort' => '13', 'name' => 'Jomin', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:58:24', 'updated_at' => '2024-01-03 08:58:24'),
            array('id' => '79', 'id_resort' => '13', 'name' => 'Tempuran', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:58:36', 'updated_at' => '2024-01-03 08:58:36'),
            array('id' => '80', 'id_resort' => '13', 'name' => 'Tirta Jaya', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:58:43', 'updated_at' => '2024-01-03 08:58:43'),
            array('id' => '81', 'id_resort' => '13', 'name' => 'Tegal Waru', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:58:50', 'updated_at' => '2024-01-03 08:59:31'),
            array('id' => '82', 'id_resort' => '2', 'name' => 'Cisarua', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 08:59:04', 'updated_at' => '2024-01-03 08:59:04'),
            array('id' => '83', 'id_resort' => '12', 'name' => 'Karang Ampel', 'price' => 0, 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 09:00:32', 'updated_at' => '2024-01-03 09:00:32')
        );

        DB::table('sites')->insert($sites);
    }
}

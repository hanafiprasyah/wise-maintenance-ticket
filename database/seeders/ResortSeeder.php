<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resorts = array(
            array('id' => '1', 'name' => 'Polrestabes Bandung', 'address' => 'Jl. Merdeka No.18-21, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:10:26', 'updated_at' => '2024-01-03 04:10:26'),
            array('id' => '2', 'name' => 'Polresta Bandung', 'address' => 'Jl. Bhayangkara No.1, Soreang, Kec. Soreang, Kabupaten Bandung, Jawa Barat 40239', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:13:36', 'updated_at' => '2024-01-03 04:13:36'),
            array('id' => '3', 'name' => 'Polresta Bogor Kota', 'address' => 'Jl. Kapten Muslihat No.18, RT.04/RW.01, Paledang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16121', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:15:47', 'updated_at' => '2024-01-03 04:15:47'),
            array('id' => '4', 'name' => 'Polresta Cirebon', 'address' => 'Jl. R.Dewi Sartika No.1, Tukmudal, Kec. Sumber, Kabupaten Cirebon, Jawa Barat 45611', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:33:31', 'updated_at' => '2024-01-03 04:33:31'),
            array('id' => '5', 'name' => 'Polres Banjar', 'address' => 'Jl. Siliwangi No.145, Karangpanimbal, Kec. Purwaharja, Kota Banjar, Jawa Barat 46332', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:34:01', 'updated_at' => '2024-01-03 04:34:01'),
            array('id' => '6', 'name' => 'Polres Bogor', 'address' => 'Jl. Tegar Beriman, Tengah, Kec. Cibinong, Kabupaten Bogor, Jawa Barat 16914', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:35:06', 'updated_at' => '2024-01-03 04:35:06'),
            array('id' => '7', 'name' => 'Polres Ciamis', 'address' => 'Jl. Jend. Sudirman No.271, Sindangrasa, Kec. Ciamis, Kabupaten Ciamis, Jawa Barat 46215', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:35:21', 'updated_at' => '2024-01-03 04:35:21'),
            array('id' => '8', 'name' => 'Polres Cianjur', 'address' => '547C+FQQ, Jl. KH Abdullah Bin Nuh, Nagrak, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43211', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:36:24', 'updated_at' => '2024-01-03 04:36:24'),
            array('id' => '9', 'name' => 'Polres Cimahi', 'address' => 'Jl. Jend. H. Amir Machmud No.333, Cigugur Tengah, Kec. Cimahi Tengah, Kota Cimahi, Jawa Barat 40522', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:36:56', 'updated_at' => '2024-01-03 04:36:56'),
            array('id' => '10', 'name' => 'Polres Cirebon Kota', 'address' => 'Jl. Veteran No.5, Kebonbaru, Kec. Kejaksan, Kota Cirebon, Jawa Barat 45116', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:37:26', 'updated_at' => '2024-01-03 04:37:26'),
            array('id' => '11', 'name' => 'Polres Garut', 'address' => 'Jl. Raya Suci, Suci, Kec. Karangpawitan, Kabupaten Garut, Jawa Barat 44182', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:37:48', 'updated_at' => '2024-01-03 04:37:48'),
            array('id' => '12', 'name' => 'Polres Indramayu', 'address' => 'Jl. Gatot Subroto, Kepandean, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat 45213', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:38:15', 'updated_at' => '2024-01-03 04:38:15'),
            array('id' => '13', 'name' => 'Polres Karawang', 'address' => ' Jl. Surotokunto No.110, Warungbambu, Kec. Karawang Tim., Karawang, Jawa Barat 41371', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:38:40', 'updated_at' => '2024-01-03 04:38:40'),
            array('id' => '14', 'name' => 'Polres Kuningan', 'address' => ' Jl. RE Martadinata No.526, Ancaran, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45511', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:39:08', 'updated_at' => '2024-01-03 04:39:08'),
            array('id' => '15', 'name' => 'Polres Majalengka', 'address' => ' Jl. Raya K H Abdul Halim No.518, Tonjong, Kec. Majalengka, Kabupaten Majalengka, Jawa Barat 45414', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:39:33', 'updated_at' => '2024-01-03 04:39:33'),
            array('id' => '16', 'name' => 'Polres Pangandaran', 'address' => 'Jl. Alun Alun Parigi No.2, Parigi, Kec. Parigi, Kab. Pangandaran, Jawa Barat', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:40:00', 'updated_at' => '2024-01-03 04:40:00'),
            array('id' => '17', 'name' => 'Polres Purwakarta', 'address' => 'Jl. Veteran No.408, Ciseureuh, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41118', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:40:28', 'updated_at' => '2024-01-03 04:40:28'),
            array('id' => '18', 'name' => 'Polres Subang', 'address' => ' Jl. Mayjen Sutoyo No.29, Karanganyar, Kec. Subang, Kabupaten Subang, Jawa Barat 41211', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:40:54', 'updated_at' => '2024-01-03 04:40:54'),
            array('id' => '19', 'name' => 'Polres Sukabumi', 'address' => 'Jl. Jenderal Sudirman, Citepus, Kec. Pelabuhan Ratu, Sukabumi Regency, Jawa Barat 43364, Indonesia', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:41:57', 'updated_at' => '2024-01-03 04:41:57'),
            array('id' => '20', 'name' => 'Polres Sukabumi Kota', 'address' => 'Jl. Perintis Kemerdekaan No.10, Gunungparang, Kec. Cikole, Kota Sukabumi, Jawa Barat 43111', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:42:32', 'updated_at' => '2024-01-03 04:42:32'),
            array('id' => '21', 'name' => 'Polres Sumedang', 'address' => 'Jl. Prabu Gajah Agung No.48, Situ, Kec. Sumedang Utara, Kabupaten Sumedang, Jawa Barat 45621', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:42:59', 'updated_at' => '2024-01-03 04:42:59'),
            array('id' => '22', 'name' => 'Polres Tasikmalaya', 'address' => ' Jl. Raya Mangunreja No.1, Mangunreja, Kec. Mangunreja, Kabupaten Tasikmalaya, Jawa Barat 46462', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:43:57', 'updated_at' => '2024-01-03 04:43:57'),
            array('id' => '23', 'name' => 'Polres Tasikmalaya Kota', 'address' => 'Jl. Letnan Harun, Sukarindik, Kec. Bungursari, Kab. Tasikmalaya, Jawa Barat 46151', 'editor' => 'Muhammad Hanafi Prasyah', 'created_at' => '2024-01-03 04:44:34', 'updated_at' => '2024-01-03 04:44:34')
        );

        DB::table('resorts')->insert($resorts);
    }
}

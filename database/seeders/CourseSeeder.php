<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $courses = [
            [
                'title' => 'Pelatihan Akutansi',
                'image' => 'akutansi.jpg',
                'content' => 'Suatu proses mencatat, meringkas, mengklasifikasikan, mengolah, dan menyajikan data transaksi, serta berbagai aktivitas yang berhubungan dengan keuangan, sehingga informasi tersebut dapat digunakan oleh seseorang yang ahli di bidangnya dan menjadi bahan untuk mengambil suatu keputusan.',
            ],
            [
                'title' => 'Pelatihan Ekonomi',
                'image' => 'ekonomi.jpg',
                'content' => 'Ilmu sosial yang mempelajari perilaku manusia dalam mengelola sumber daya yang terbatas dan menyalurkannya ke dalam berbagai individu atau kelompok yang ada dalam suatu masyarakat.',
            ],
            [
                'title' => 'Pelatihan Manajemen SDM',
                'image' => 'sdm.jpg',
                'content' => 'Pemanfaatan sejumlah individu secara efisien dan efektif serta dapat digunakan secara maksimal untuk mencapai tujuan organisasi atau perusahaan.',
            ],
            [
                'title' => 'Pelatihan Kewirausahaan',
                'image' => 'kewirausahaan.jpg',
                'content' => 'Proses mengidentifikasi, mengembangkan dan membawa visi ke dalam kehidupan. Visi tersebut bisa berupa ide inovatif, ide berjualan, peluang, cara yang lebih baik dalam menjalankan sesuatu.',
            ],
            [
                'title' => 'Pelatihan Manajemen Resiko',
                'image' => 'resiko.jpg',
                'content' => 'Suatu pendekatan terstruktur atau metodologi dalam mengelola ketidakpastian yang berkaitan dengan ancaman',
            ],
            [
                'title' => 'Pelatihan Manajemen Ritel',
                'image' => 'ritel.jpg',
                'content' => 'Proses menjalankan dan mengelola aktivitas keseharian ritel terkait penjualan barang dan jasa kepada pelanggan.',
            ],
        ];

        for ($i = 0; $i < count($courses); $i++) {
            Course::create($courses[$i]);
        }
    }
}

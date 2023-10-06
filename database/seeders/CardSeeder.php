<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $cardData = [
            [
                'title' => 'Assessment Center',
                'icon' => 'fas fa-chalkboard-teacher',
                'content' => 'Metode untuk menggali kompetensi yang perlu dikembangkan oleh individu melalui sejumlah simulasi.',
            ],
            [
                'title' => 'Bimbingan Teknis',
                'icon' => 'fas fa-users-cog',
                'content' => 'layanan bimbingan yang bertujuan meningkatkan kualitas Sumber Daya Manusia.',
            ],
            [
                'title' => 'Computer Assisted Test',
                'icon' => 'fas fa-desktop',
                'content' => 'Suatu sistem yang dipakai untuk membantu proses seleksi dengan alat bantu komputer.',
            ],
            [
                'title' => 'Management Consulting',
                'icon' => 'fas fa-briefcase',
                'content' => 'Untuk melakukan pembinaan manajemen dengan dua bidang usaha yaitu pelatihan dan konsultansi manajemen.',
            ],
            [
                'title' => 'Pelatihan Berbasis Kompetensi',
                'icon' => 'fas fa-scroll',
                'content' => 'jenis pelatihan yang fokus pada pengembangan kompetensi atau keterampilan spesifik untuk dapat melaksanakan tugas dengan efektif.',
            ],
            [
                'title' => 'Pelatihan Vokasi',
                'icon' => 'fas fa-school',
                'content' => 'Program ini memfokuskan pada pengajaran keterampilan dan praktik kerja.',
            ],
            [
                'title' => 'Softskill',
                'icon' => 'fas fa-microphone-alt',
                'content' => 'Keahlian bagaimana seseorang dapat berinteraksi dan bersosialisasi dengan orang lain di dalam dunia kerja.',
            ],
        ];

        for ($i = 0; $i < count($cardData); $i++) {
            Card::create($cardData[$i]);
        }
    }
}

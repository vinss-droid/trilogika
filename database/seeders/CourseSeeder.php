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
                'content' => '',
            ],
            [
                'title' => 'Pelatihan Ekonomi',
                'image' => 'ekonomi.jpg',
                'content' => '',
            ],
            [
                'title' => 'Pelatihan Manajemen SDM',
                'image' => 'sdm.jpg',
                'content' => '',
            ],
            [
                'title' => 'Pelatihan Kewirausahaan',
                'image' => 'kewirausahaan.jpg',
                'content' => '',
            ],
            [
                'title' => 'Pelatihan Manajemen Resiko',
                'image' => 'resiko.jpg',
                'content' => '',
            ],
            [
                'title' => 'Pelatihan Manajemen Ritel',
                'image' => 'ritel.jpg',
                'content' => '',
            ],
        ];

        for ($i = 0; $i < count($courses); $i++) {
            Course::create($courses[$i]);
        }
    }
}

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
                'image' => 'course-01.jpg',
                'content' => '',
            ],
            [
                'title' => 'Pelatihan Ekonomi',
                'image' => 'course-02.jpg',
                'content' => '',
            ],
            [
                'title' => 'Pelatihan Manajemen SDM',
                'image' => 'course-03.jpg',
                'content' => '',
            ],
            [
                'title' => 'Pelatihan Kewirausahaan',
                'image' => 'course-04.jpg',
                'content' => '',
            ],
            [
                'title' => 'Pelatihan Manajemen Resiko',
                'image' => 'course-01.jpg',
                'content' => '',
            ],
            [
                'title' => 'Pelatihan Manajemen Ritel',
                'image' => 'course-02.jpg',
                'content' => '',
            ],
        ];

        for ($i = 0; $i < count($courses); $i++) {
            Course::create($courses[$i]);
        }
    }
}

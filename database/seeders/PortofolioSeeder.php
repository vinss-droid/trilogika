<?php

namespace Database\Seeders;

use App\Models\Portofolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/backup/portofolios.json'));
        $portos = json_decode($json, true);

        foreach ($portos as $porto) {
            // Lakukan sesuatu, misalnya menyimpan ke dalam basis data
            Portofolio::create($porto);
        }
    }
}

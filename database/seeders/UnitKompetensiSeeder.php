<?php

namespace Database\Seeders;

use App\Models\UnitKompetensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UnitKompetensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/backup/unitkompetensi.json'));
        $units = json_decode($json, true);

        foreach ($units as $unit) {
            // Lakukan sesuatu, misalnya menyimpan ke dalam basis data
            UnitKompetensi::create($unit);
        }
    }
}

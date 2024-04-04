<?php

namespace Database\Seeders;

use App\Models\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SchemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/backup/schema.json'));
        $schemas = json_decode($json, true);

        foreach ($schemas as $schema) {
            // Lakukan sesuatu, misalnya menyimpan ke dalam basis data
            Schema::create($schema);
        }
    }
}

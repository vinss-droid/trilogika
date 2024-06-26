<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $json = File::get(database_path('seeders/backup/articles.json'));
        $articles = json_decode($json, true);

        foreach ($articles as $article) {
            // Lakukan sesuatu, misalnya menyimpan ke dalam basis data
            Article::create($article);
        }

    }
}

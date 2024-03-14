<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('salary');
            $table->string('education_level');
            $table->string('age');
            $table->enum('gender',['laki-laki','perempuan','laki-laki / perempuan']);
            $table->string('work_status');
            $table->string('location');
            $table->string('image');
            $table->date('end_date');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->string('link');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};

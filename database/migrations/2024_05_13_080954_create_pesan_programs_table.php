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
        Schema::create('pesan_programs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('program');
            $table->string('sekolah');
            $table->string('pendidikan');
            $table->string('harga');
            $table->string('discount');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_programs');
    }
};

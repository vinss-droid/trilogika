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
        Schema::create('bukti_persyaratans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('ijazah')->nullable();
            $table->string('sk_kerja')->nullable();
            $table->string('ktp')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('cv')->nullable();
            $table->enum('status',['lengkap','belum'])->default('belum');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukti_persyaratans');
    }
};

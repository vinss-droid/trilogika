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
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('education');
            $table->date('birth_date');
            $table->string('place_of_birth');
            $table->string('address');
            $table->string('sub_region');
            $table->string('region');
            $table->string('city');
            $table->string('province');
            $table->enum('gender',['L','P'])->default('L');
            $table->string('nationality');
            $table->string('telephone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};

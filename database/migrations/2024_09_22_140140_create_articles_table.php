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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('publisher');
            $table->string('title');
            $table->text('content');
            $table->enum('type', ['Edukasi', 'Religi', 'Teknologi', 'Hiburan', 'Olahraga']);
            $table->string('photo'); // Kolom untuk menyimpan path atau nama file foto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

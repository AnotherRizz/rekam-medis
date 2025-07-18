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
       Schema::create('pemeriksaans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('pasien_id')->constrained()->onDelete('cascade');
    $table->string('no_periksa')->unique();
    $table->text('keluhan');
    $table->text('riwayat_penyakit');
    $table->string('tensi_darah')->nullable(); 
    $table->decimal('bb', 5, 2);
    $table->decimal('tb', 5, 2);
    $table->date('tgl_periksa');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};